<?php

namespace App\Http\Controllers;

use App\Models\Departure;
use App\Models\Package;
use App\Models\PageSection;
use App\Models\Place;
use App\Models\Review;
use App\Models\SocialEmbed;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $featuredPackages = Cache::remember('featured_packages', now()->endOfDay(), function () {
            return Package::where('status', 'published')
                ->with('place', 'destination')
                ->take(6)
                ->get();
        });

        $regularPackages = Cache::remember('regular_packages', now()->endOfDay(), function () {
            return Package::where('status', 'published')
                ->with('place', 'destination')
                ->inRandomOrder()
                ->take(6)
                ->get();
        });

        $places = Place::where('status', 'active')
            ->withCount(['packages' => function ($query) {
                $query->where('status', 'published');
            }])
            ->having('packages_count', '>', 0)
            ->get();

        $month = $request->get('month', Carbon::now()->month);
        $year = $request->get('year', Carbon::now()->year);

        $start = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $end = Carbon::createFromDate($year, $month, 1)->endOfMonth();

        $departures = Departure::where(function ($query) use ($start, $end) {
            $query->whereBetween('start_date', [$start, $end])
                ->orWhereBetween('end_date', [$start, $end])
                ->orWhere(function ($q) use ($start, $end) {
                    $q->where('start_date', '<=', $start)
                        ->where('end_date', '>=', $end);
                });
        })
            ->with(['package' => function ($query) {
                $query->select('id', 'title', 'slug', 'tour_duration', 'price', 'status');
            }])
            ->whereHas('package', function ($query) {
                $query->where('status', 'published');
            })
            ->select('id', 'package_id', 'start_date', 'end_date')
            ->inRandomOrder()
            ->limit(10)
            ->get();

        $reviews = Review::where('status', 'approved')
            ->latest()
            ->take(10)
            ->get();

        $socialEmbeds = SocialEmbed::limit(3)->latest()->get();

        $faqContent = PageSection::where('key', 'home_faqs')->first();
        $pageFaqs = $this->getPageFaqs($faqContent->value);

        return view('home.index', compact(
            'featuredPackages',
            'regularPackages',
            'places',
            'departures',
            'month',
            'year',
            'reviews',
            'socialEmbeds',
            'pageFaqs'
        ));
    }


    private function getPageFaqs($pageFaqs)
    {
        $faqs = [];

        if ($pageFaqs) {
            $faqLines = explode("\n", trim($pageFaqs));
            $currentQuestion = null;
            $currentAnswer = '';

            foreach ($faqLines as $line) {
                $line = trim($line);
                if (empty($line)) continue;

                if (str_starts_with($line, '##')) {
                    // If we have a previous QA pair, save it
                    if ($currentQuestion !== null) {
                        $faqs[] = [
                            'question' => $currentQuestion,
                            'answer' => trim($currentAnswer)
                        ];
                    }
                    // Start new question
                    $currentQuestion = trim(substr($line, 2));
                    $currentAnswer = '';
                } else {
                    // Add to current answer
                    $currentAnswer .= $line . ' ';
                }
            }

            // Add the last QA pair
            if ($currentQuestion !== null) {
                $faqs[] = [
                    'question' => $currentQuestion,
                    'answer' => trim($currentAnswer)
                ];
            }
        }

        return  $faqs;
    }
}
