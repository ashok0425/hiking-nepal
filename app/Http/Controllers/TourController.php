<?php

namespace App\Http\Controllers;

use App\Models\Departure;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TourController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $slug)
    {
        $month = $request->get('month', Carbon::now()->month);
        $year = $request->get('year', Carbon::now()->year);

        $tourPackage = Package::where('slug', $slug)
            ->where('status', 'published')
            ->with('place', 'destination')
            ->firstOrFail();

        $departures = Departure::where('package_id', $tourPackage->id)
            ->whereYear('start_date', $year)
            ->whereMonth('start_date', $month)
            ->whereDate('start_date', '>', now())
            ->orderBy('start_date')
            ->get();

        $packages = $tourPackage->relatedPackages()
            ->where('status', 'published')
            ->with('place', 'destination')
            ->get();

        if ($packages->isEmpty()) {
            $packages = Package::where('status', 'published')
                ->where('id', '!=', $tourPackage->id)
                ->with('place', 'destination')
                ->inRandomOrder()
                ->take(2)
                ->get();
        }

        $faqs = $this->getTourFaqs($tourPackage);

        return view('tours', compact(
            'tourPackage',
            'packages',
            'departures',
            'month',
            'year',
            'faqs'
        ));
    }

    private function getTourFaqs(Package $tourPackage)
    {
        $faqs = [];

        if ($tourPackage->faqs) {
            $faqLines = explode("\n", trim($tourPackage->faqs));
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
