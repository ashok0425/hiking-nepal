<?php

namespace App\Http\Controllers;

use App\Models\Departure;
use App\Models\Package;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $packages = Package::where('status', 'published')
            ->with('place', 'destination')
            ->take(6)
            ->get();

        $places = Place::where('status', 'active')
            ->withCount(['packages' => function ($query) {
                $query->where('status', 'published');
            }])
            ->having('packages_count', '>', 0)
            ->get();

        $month = $request->get('month', Carbon::now()->month);
        $year = $request->get('year', Carbon::now()->year);

        $departures = Departure::whereYear('start_date', $year)
            ->whereMonth('start_date', $month)
            ->with(['package' => function ($query) {
                $query->select('id', 'title', 'slug', 'tour_duration', 'price', 'status');
            }])
            ->whereHas('package', function ($query) {
                $query->where('status', 'published');
            })
            ->select('id', 'package_id', 'start_date', 'end_date')
            ->get();

        $reviews = Review::where('status', 'approved')
            ->with('package:id,title,slug')
            ->latest()
            ->take(10)
            ->get();

        return view('home.index', compact('packages', 'places', 'departures', 'month', 'year', 'reviews'));
    }
}
