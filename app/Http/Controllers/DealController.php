<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Destination;
use App\Models\Package;
use App\Models\PackageCategory;
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


        $packages = collect();

        if (request()->hasAny(['destination', 'place', 'activity', 'search'])) {
            $query = Package::where('status', 'published')
                ->with('place', 'destination');

            if (request('destination')) {
                $destinationId = $destinations->firstWhere('slug', request('destination'))->id ?? null;
                if ($destinationId) {
                    $query->where('destination_id', $destinationId);
                }
            }

            if (request('place')) {
                $placeId = $allPlaces->firstWhere('slug', request('place'))->id ?? null;
                if ($placeId) {
                    $query->where('place_id', $placeId);
                }
            }

            // if (request('activity')) {
            //     $query->where('activities', $request('activity'));
            // }

            if (request('search')) {
                $search = request('search');
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                });
            }
            $packages = $query->paginate()->withQueryString();
        }

        $packageCategories = PackageCategory::where('status', 'active')
            ->with(['packages' => function ($query) {
                $query->where('status', 'published')->with('place', 'destination');
            }])
            ->whereHas('packages', function ($query) {
                $query->where('status', 'published');
            }, '>', 1)
            ->get();

        return view('deals', [
            'activities' => $activities,
            'destinations' => $destinations,
            'places' => $places,
            'allPlaces' => $allPlaces,
            'packages' => $packages,
            'packageCategories' => $packageCategories,
        ]);
    }
}
