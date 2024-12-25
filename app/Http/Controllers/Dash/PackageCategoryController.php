<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PackageCategory;
use Illuminate\Http\Request;

class PackageCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = PackageCategory::latest();

        if ($search = $request->get('q')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $categories = $query->paginate()->withQueryString();

        return view('admin.package-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.package-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
        ]);

        PackageCategory::create($validated);

        return redirect()->route('admin.package-categories.index')
            ->with('success', 'Package category created successfully.');
    }

    public function show(PackageCategory $packageCategory)
    {
        return view('admin.package-categories.show', compact('packageCategory'));
    }

    public function edit(PackageCategory $packageCategory)
    {
        return view('admin.package-categories.edit', compact('packageCategory'));
    }

    public function update(Request $request, PackageCategory $packageCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'status' => 'required|string|in:active,inactive',
            'description' => 'nullable|string',
        ]);

        $packageCategory->update($validated);

        return redirect()->route('admin.package-categories.index')
            ->with('success', 'Package category updated successfully.');
    }

    public function destroy(PackageCategory $packageCategory)
    {
        $packageCategory->delete();

        return redirect()->route('admin.package-categories.index')
            ->with('success', 'Package category deleted successfully.');
    }
}
