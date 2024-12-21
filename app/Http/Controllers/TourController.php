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
            ->orderBy('start_date')
            ->get();

        $packages = Package::where('status', 'published')
            ->with('place', 'destination')
            ->take(2)
            ->get();

        return view('tours', compact(
            'tourPackage',
            'packages',
            'departures',
            'month',
            'year'
        ));
    }
}
