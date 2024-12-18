<?php

namespace App\Providers;

use App\Models\Destination;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
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

        View::composer('layouts.website', function ($view) {
            $destinations = Destination::getList();

            // Get categories for all destinations in a single query
            $destinationCategories = DB::table('package_package_category')
                ->join('packages', 'packages.id', '=', 'package_package_category.package_id')
                ->join('package_categories', 'package_categories.id', '=', 'package_package_category.package_category_id')
                ->whereIn('packages.destination_id', $destinations->pluck('id'))
                ->where('package_categories.status', 'active')
                ->select('package_categories.id', 'package_categories.name', 'package_categories.slug', 'packages.destination_id')
                ->distinct()
                ->get()
                ->groupBy('destination_id');

            // Attach categories to each destination
            $destinations->each(function ($destination) use ($destinationCategories) {
                $destination->categories = $destinationCategories[$destination->id] ?? collect();
            });

            $view->with('destinations', $destinations);
        });
    }
}
