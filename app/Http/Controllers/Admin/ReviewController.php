<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::query();

        if ($request->has('q')) {
            $searchTerm = $request->query('q');
            $query->where('user_name', 'LIKE', "%{$searchTerm}%")
                ->orWhere('comment', 'LIKE', "%{$searchTerm}%");
        }

        $reviews = $query->with('package')->latest()->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        $packages = Package::where('status', 'published')->get();

        return view('admin.reviews.create', compact('packages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|max:255',
            'user_photo' => 'nullable|image|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'package_id' => 'required|exists:packages,id',
            'status' => 'in:pending,approved,rejected',
        ]);

        // Handle file upload for user photo if needed
        if ($request->hasFile('user_photo')) {
            $photoPath = $request->file('user_photo')->store('review_photos', 'public');
            $validated['user_photo'] = $photoPath;
        }

        Review::create($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review created successfully');
    }

    public function edit(Review $review)
    {
        $packages = Package::where('status', 'published')->get();

        return view('admin.reviews.edit', compact('review', 'packages'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'user_name' => 'required|max:255',
            'user_photo' => 'nullable|image|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'package_id' => 'required|exists:packages,id',
            'status' => 'in:pending,approved,rejected',
        ]);

        // Handle file upload for user photo if needed
        if ($request->hasFile('user_photo')) {
            $photoPath = $request->file('user_photo')->store('review_photos', 'public');
            $validated['user_photo'] = $photoPath;
        }

        $review->update($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review updated successfully');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review deleted successfully');
    }
}
