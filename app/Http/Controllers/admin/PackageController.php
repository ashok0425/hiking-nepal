<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $query = Package::latest()->with(['destination', 'place', 'categories']);

        // Search functionality
        if ($request->has('q')) {
            $searchTerm = $request->query('q');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%");
            });
        }

        $packages = $query->paginate()->withQueryString();

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create', [
            'destinations' => Destination::where('status', 'active')->get(),
            'places' => Place::where('status', 'active')->get(),
            'categories' => PackageCategory::where('status', 'active')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
            'activities' => ['nullable', 'string'],
            'fitness_level' => ['nullable', 'string'],
            'max_elevation' => ['nullable', 'string'],
            'commute' => ['nullable', 'string'],
            'best_time' => ['nullable', 'string'],
            'group_size' => ['nullable', 'string'],
            'arrival_at' => ['nullable', 'string'],
            'departure_from' => ['nullable', 'string'],
            'meal' => ['nullable', 'string'],
            'tour_duration' => ['nullable', 'string'],
            'stay' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price_per_person' => ['required', 'numeric', 'min:0'],
            'sale_price_two_plus_per_person' => ['nullable', 'numeric', 'min:0'],
            'sale_price_eight_plus_per_person' => ['nullable', 'numeric', 'min:0'],
            'destination_id' => ['required', 'exists:destinations,id'],
            'place_id' => ['required', 'exists:places,id'],
            'overview' => ['required', 'string'],
            'itinerary' => ['nullable', 'string'],
            'faqs' => ['nullable', 'string'],
            'departures' => ['required', 'array', 'min:1'],
            'departures.*.from_date' => ['required', 'date'],
            'departures.*.to_date' => ['required', 'date', 'after_or_equal:departures.*.from_date'],
            'departures.*.days' => ['required', 'array', 'min:1'],
            'departures.*.days.*' => ['required', 'string', Rule::in(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['image', 'max:2048'],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:package_categories,id'],
            'meta_title' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
        ]);

        // Handle gallery uploads
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('packages/gallery', 'public');
                $gallery[] = $path;
            }
            $validated['gallery'] = $gallery;
        }

        $package = Package::create($validated);

        // Sync categories
        $package->categories()->sync($request->categories);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package created successfully');
    }

    public function edit(Package $package)
    {
        $package->load(['destination', 'place', 'categories']);

        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
            'activities' => ['nullable', 'string'],
            'fitness_level' => ['nullable', 'string'],
            'max_elevation' => ['nullable', 'string'],
            'commute' => ['nullable', 'string'],
            'best_time' => ['nullable', 'string'],
            'group_size' => ['nullable', 'string'],
            'arrival_at' => ['nullable', 'string'],
            'departure_from' => ['nullable', 'string'],
            'meal' => ['nullable', 'string'],
            'tour_duration' => ['nullable', 'string'],
            'stay' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price_per_person' => ['required', 'numeric', 'min:0'],
            'sale_price_two_plus_per_person' => ['nullable', 'numeric', 'min:0'],
            'sale_price_eight_plus_per_person' => ['nullable', 'numeric', 'min:0'],
            'destination_id' => ['required', 'exists:destinations,id'],
            'place_id' => ['required', 'exists:places,id'],
            'overview' => ['required', 'string'],
            'itinerary' => ['nullable', 'string'],
            'faqs' => ['nullable', 'string'],
            'departures' => ['nullable', 'array'],
            'new_gallery' => ['nullable', 'array'],
            'new_gallery.*' => ['image', 'max:2048'],
            'remove_gallery' => ['nullable', 'array'],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:package_categories,id'],
            'meta_title' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
        ]);

        // Handle gallery updates
        if ($request->hasFile('new_gallery')) {
            $gallery = $package->gallery ?? [];
            foreach ($request->file('new_gallery') as $image) {
                $path = $image->store('packages/gallery', 'public');
                $gallery[] = $path;
            }
            $validated['gallery'] = $gallery;
        }

        // Remove gallery images
        if ($request->has('remove_gallery')) {
            $currentGallery = $package->gallery ?? [];
            $newGallery = array_diff($currentGallery, $request->remove_gallery);

            // Delete removed files
            foreach ($request->remove_gallery as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $validated['gallery'] = array_values($newGallery);
        }

        $package->update($validated);

        // Sync categories
        $package->categories()->sync($request->categories);

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package updated successfully');
    }

    public function destroy(Package $package)
    {
        // Delete gallery images
        if ($package->gallery) {
            foreach ($package->gallery as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $package->delete();

        return redirect()
            ->route('admin.packages.index')
            ->with('success', 'Package deleted successfully');
    }
}
