<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
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

            $packages->each(function ($package) use ($packagesByCategories) {
                $category = $package->categories->first();

                if (! $category) {
                    // Handle packages without categories
                    if (! $packagesByCategories->has('general')) {
                        $packagesByCategories['general'] = [
                            'name' => 'General Tours',
                            'tagline' => 'Explore amazing tours and experiences',
                            'slug' => 'general',
                            'packages' => collect(),
                        ];
                    }
                    $packagesByCategories['general']['packages']->push($package);

                    return;
                }

                $categoryKey = $category->slug;

                if (! $packagesByCategories->has($categoryKey)) {
                    $packagesByCategories[$categoryKey] = [
                        'name' => $category->name,
                        'tagline' => $category->tagline ?? '',
                        'slug' => $category->slug,
                        'packages' => collect(),
                    ];
                }

                $packagesByCategories[$categoryKey]['packages']->push($package);
            });

            return view('destination', compact('destination', 'packagesByCategories'));
        }

        $post = Post::where('status', 'published')
            ->where('slug', $slug)
            ->first();

        if ($post) {
            return view('blog-page', compact('post'));
        }

        abort(404);
    }
}
