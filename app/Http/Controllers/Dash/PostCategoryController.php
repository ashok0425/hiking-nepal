<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = PostCategory::query();

        if ($request->has('q')) {
            $searchTerm = $request->query('q');
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }

        $postActivities = $query->orderBy('created_at', 'desc')->get();

        return view('admin.post-categories.index', compact('postActivities'));
    }

    public function create()
    {
        return view('admin.post-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:post_categories,name',
            'description' => 'required',
        ]);

        PostCategory::create($validated);

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Post Category created successfully');
    }

    public function edit(PostCategory $postCategory)
    {
        return view('admin.post-categories.edit', compact('postCategory'));
    }

    public function update(Request $request, PostCategory $postCategory)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:post_categories,name,'.$postCategory->id,
            'description' => 'required',
        ]);

        $postCategory->update($validated);

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Post Category updated successfully');
    }

    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();

        return redirect()->route('admin.post-categories.index')
            ->with('success', 'Post Category deleted successfully');
    }
}
