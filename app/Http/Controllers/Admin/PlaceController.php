<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Place::latest();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $places = $query->paginate(10)->withQueryString();

        return view('admin.places.index', compact('places', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.places.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'cover' => 'required_if:status,active|image|max:2048',
            'status' => 'required|in:active,inactive',
            'destination_id' => 'required|exists:destinations,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('places', 'public');
            $validated['cover'] = $coverPath;
        }

        Place::create($validated);

        return redirect()->route('admin.places.index')
            ->with('success', 'Place created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        return view('admin.places.show', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        return view('admin.places.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'cover' => [
                $place->cover ? 'nullable' : 'required_if:status,active',
                'image',
                'max:2048',
            ],
            'status' => 'required|in:active,inactive',
            'destination_id' => 'required|exists:destinations,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);
        if ($request->hasFile('cover')) {
            // Delete old image if exists
            if ($place->cover) {
                Storage::disk('public')->delete($place->cover);
            }

            $coverPath = $request->file('cover')->store('places', 'public');
            $validated['cover'] = $coverPath;
        }

        $place->update($validated);

        return redirect()->route('admin.places.index')
            ->with('success', 'Place updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        if ($place->cover) {
            Storage::disk('public')->delete($place->cover);
        }

        $place->delete();

        return redirect()->route('admin.places.index')
            ->with('success', 'Place deleted successfully.');
    }
}
