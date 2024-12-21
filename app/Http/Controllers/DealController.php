<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Place;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $activities = Activity::orderBy('name')->get();
        $destinations = Destination::activeAndOrdered()->get();
        $places = collect();

        if (request('destination')) {
            $places = Place::where('destination_id', request('destination'))
                ->where('status', 'active')
                ->orderBy('name')
                ->get();
        }

        // Get all active places for JavaScript
        $allPlaces = Place::where('status', 'active')
            ->orderBy('name')
            ->get(['id', 'name', 'destination_id', 'slug'])
            ->map(function ($place) {
                $place->destination_slug = Destination::find($place->destination_id)->slug;
                return $place;
            });


        $packages = Package::where('status', 'published')
            ->with('place', 'destination')
            ->take(3)
            ->get();

        return view('deals', [
            'activities' => $activities,
            'destinations' => $destinations,
            'places' => $places,
            'allPlaces' => $allPlaces,
            'packages' => $packages
        ]);
    }
}
