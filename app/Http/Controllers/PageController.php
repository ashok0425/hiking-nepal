<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $slug)
    {
        $destination = Destination::where('status', 'active')
            ->where('slug', $slug)
            ->first();

        if ($destination) {
            $packages = Package::where('destination_id', $destination->id)
                ->where('status', 'published')
                ->with('categories', 'place', 'destination')
                ->get();

            $packagesByCategories = collect();
            $packagesByPlaces = collect();
            $packagesByActivities = collect();

            $packages->each(function ($package) use ($packagesByCategories, $packagesByPlaces, $packagesByActivities) {
                $category = $package->categories->first();

                if (!$category) {
                    if (!$packagesByCategories->has('general')) {
                        $packagesByCategories['general'] = [
                            'name' => 'General Tours',
                            'tagline' => 'Explore amazing tours and experiences',
                            'slug' => 'general',
                            'packages' => collect(),
                        ];
                    }
                    $packagesByCategories['general']['packages']->push($package);
                } else {
                    $categoryKey = $category->slug;
                    if (!$packagesByCategories->has($categoryKey)) {
                        $packagesByCategories[$categoryKey] = [
                            'name' => $category->name,
                            'tagline' => $category->tagline ?? '',
                            'slug' => $category->slug,
                            'packages' => collect(),
                        ];
                    }
                    $packagesByCategories[$categoryKey]['packages']->push($package);
                }

                // Handle places
                if ($package->place) {
                    $placeKey = $package->place->slug;
                    if (!$packagesByPlaces->has($placeKey)) {
                        $packagesByPlaces[$placeKey] = [
                            'name' => $package->place->name,
                            'description' => $package->place->description,
                            'slug' => $package->place->slug,
                            'cover' => $package->place->cover,
                            'packages' => collect(),
                        ];
                    }
                    $packagesByPlaces[$placeKey]['packages']->push($package);
                }

                // Handle activities
                foreach ($package->activities as $activity) {
                    $activityKey = $activity->slug;
                    if (!$packagesByActivities->has($activityKey)) {
                        $packagesByActivities[$activityKey] = [
                            'name' => $activity->name,
                            'description' => $activity->description,
                            'slug' => $activity->slug,
                            'packages' => collect(),
                        ];
                    }
                    $packagesByActivities[$activityKey]['packages']->push($package);
                }
            });

            return view('destination', compact('destination', 'packagesByCategories', 'packagesByPlaces', 'packagesByActivities'));
        }

        $post = Post::where('status', 'published')
            ->where('slug', $slug)
            ->first();

        if ($post) {
            return view('blog-page', compact('post'));
        }

        $page = Page::where('status', 'published')
            ->where('slug', $slug)
            ->first();

        if ($page) {
            return view('page', compact('page'));
        }

        abort(404);
    }
}
