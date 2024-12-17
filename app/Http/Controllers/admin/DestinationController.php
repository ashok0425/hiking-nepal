<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $query = Destination::query();

        if ($request->has('q')) {
            $searchTerm = $request->query('q');
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }

        $destinations = $query->orderBy('order')->get();

        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'tagline' => 'required|max:255',
            'status' => 'required|in:active,inactive',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'desc' => 'required',
            'order' => 'required|integer',
            'meta_title' => 'nullable|max:255',
            'meta_keyword' => 'nullable|max:255',
            'meta_description' => 'nullable',
        ]);

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverPath = $cover->store('destinations', 'public');
            $validated['cover'] = $coverPath;
        }

        Destination::create($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination created successfully');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'tagline' => 'required|max:255',
            'status' => 'required|in:active,inactive',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'desc' => 'required',
            'order' => 'required|integer',
            'meta_title' => 'nullable|max:255',
            'meta_keyword' => 'nullable|max:255',
            'meta_description' => 'nullable',
        ]);

        if ($request->hasFile('cover')) {
            if ($destination->cover) {
                Storage::disk('public')->delete($destination->cover);
            }

            $cover = $request->file('cover');
            $coverPath = $cover->store('destinations', 'public');
            $validated['cover'] = $coverPath;
        }

        $destination->update($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination updated successfully');
    }

    public function destroy(Destination $destination)
    {
        if ($destination->cover) {
            Storage::disk('public')->delete($destination->cover);
        }

        $destination->delete();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination deleted successfully');
    }
}
