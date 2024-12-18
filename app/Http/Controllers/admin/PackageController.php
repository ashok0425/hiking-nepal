<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePackageRequest;
use App\Http\Requests\Admin\UpdatePackageRequest;
use App\Models\Destination;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(StorePackageRequest $request)
    {
        $validated = $request->validated();

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

        return view('admin.packages.edit', [
            'package' => $package,
            'destinations' => Destination::where('status', 'active')->get(),
            'places' => Place::where('status', 'active')->get(),
            'categories' => PackageCategory::where('status', 'active')->get(),
        ]);
    }

    public function update(UpdatePackageRequest $request, Package $package)
    {
        $validated = $request->validated();

        // Start with current gallery or empty array
        $gallery = $package->gallery ?? [];

        // Remove gallery images if specified
        if ($request->has('remove_gallery') && is_array($request->remove_gallery)) {
            foreach ($request->remove_gallery as $imagePath) {
                if (in_array($imagePath, $gallery)) {
                    Storage::disk('public')->delete($imagePath);
                    $gallery = array_values(array_diff($gallery, [$imagePath]));
                }
            }
        }

        // Add new gallery images
        if ($request->hasFile('new_gallery')) {
            foreach ($request->file('new_gallery') as $image) {
                $path = $image->store('packages/gallery', 'public');
                $gallery[] = $path;
            }
        }

        // Update gallery in validated data
        $validated['gallery'] = $gallery;

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
