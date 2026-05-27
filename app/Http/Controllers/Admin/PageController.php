<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $query = Page::query();

        if ($request->filled('q')) {
            $term = $request->query('q');
            $query->where(function ($q) use ($term) {
                $q->where('title', 'LIKE', "%{$term}%")
                    ->orWhere('slug', 'LIKE', "%{$term}%");
            });
        }

        $pages = $query->orderBy('title')->paginate(20)->withQueryString();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|alpha_dash|unique:pages,slug',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        $page = Page::create($validated);

        return redirect()->route('admin.pages.edit', $page)
            ->with('success', 'Page created successfully');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('pages', 'slug')->ignore($page->id)],
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        $page->update($validated);

        return redirect()->route('admin.pages.edit', $page)
            ->with('success', 'Page updated successfully');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page deleted successfully');
    }
}
