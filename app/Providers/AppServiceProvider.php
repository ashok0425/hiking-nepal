<?php

namespace App\Providers;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer(['layouts.website', 'home.index'], function ($view) {
            // Get all published packages with their relationships
            $packages = Package::with([
                'destination:id,name,slug,cover',
                'categories:id,name,slug',
                'activities:id,name,slug',
                'place:id,name,slug',
            ])
                ->select('id', 'title', 'slug', 'destination_id', 'place_id', 'status')
                ->where('status', 'published')
                ->where('show_in_nav', true)
                ->get();
            // First level: Group packages by destination to get unique destinations
            $destinations = $packages->groupBy('destination_id')
                ->map(function ($destinationPackages) {
                    $destination = $destinationPackages->first()->destination;

                    // Second level: Get unique categories and activities for this destination
                    $categories = $destinationPackages->flatMap->categories
                        ->unique('id')
                        ->map(function ($category) use ($destinationPackages) {
                            // Third level: Get packages for this category in this destination
                            $categoryPackages = $destinationPackages->filter(function ($package) use ($category) {
                                return $package->categories->contains('id', $category->id);
                            });

                            return [
                                'name' => $category->name,
                                'slug' => $category->slug,
                                'packages' => $categoryPackages->map(function ($package) {
                                    return [
                                        'title' => $package->title,
                                        'slug' => $package->slug,
                                    ];
                                })->toArray(),
                            ];
                        });

                    $activities = $destinationPackages->flatMap->activities
                        ->unique('id')
                        ->map(function ($activity) use ($destinationPackages) {
                            // Third level: Get packages for this activity in this destination
                            $activityPackages = $destinationPackages->filter(function ($package) use ($activity) {
                                return $package->activities->contains('id', $activity->id);
                            });

                            return [
                                'name' => $activity->name,
                                'slug' => $activity->slug,
                                'packages' => $activityPackages->map(function ($package) {
                                    return [
                                        'title' => $package->title,
                                        'slug' => $package->slug,
                                    ];
                                })->toArray(),
                            ];
                        });

                    // Add places grouping
                    $places = $destinationPackages->groupBy('place_id')
                        ->map(function ($placePackages) {
                            $place = $placePackages->first()->place;
                            if (!$place) return null;

                            return [
                                'name' => $place->name,
                                'slug' => $place->slug,
                                'packages' => $placePackages->map(function ($package) {
                                    return [
                                        'title' => $package->title,
                                        'slug' => $package->slug,
                                    ];
                                })->toArray(),
                            ];
                        })
                        ->filter() // Remove null values (packages without places)
                        ->values(); // Reset array keys

                    return [
                        'name' => $destination->name,
                        'slug' => $destination->slug,
                        'cover' => $destination->cover,
                        'packages_count' => $destinationPackages->count(),
                        'categories' => $categories->toArray(),
                        'activities' => $activities->toArray(),
                        'places' => $places->toArray(),
                    ];
                })->toArray();

            $view->with('destinations', $destinations);
        });
    }
}
