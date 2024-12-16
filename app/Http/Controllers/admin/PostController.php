<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::latest();

        if ($request->has('q')) {
            $searchTerm = $request->q;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('meta_title', 'LIKE', "%{$searchTerm}%");
            });
        }

        $posts = $query->latest('created_at')->paginate()->withQueryString();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|max:2048',
            'cover' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable|max:255',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('posts/thumbnails', 'public');
        }

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('posts/covers', 'public');
        }

        $validated['published_at'] = $this->getPublishedAt($request->status, $request->published_at);
        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|max:2048',
            'cover' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable|max:255',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('posts/thumbnails', 'public');
        }

        if ($request->hasFile('cover')) {
            if ($post->cover) {
                Storage::disk('public')->delete($post->cover);
            }
            $validated['cover'] = $request->file('cover')->store('posts/covers', 'public');
        }

        $validated['published_at'] = $this->getPublishedAt($request->status, $request->published_at);
        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }
        if ($post->cover) {
            Storage::disk('public')->delete($post->cover);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully');
    }

    private function getPublishedAt($status, $publishedAt)
    {
        if ($status === 'published') {
            return $publishedAt ?? Carbon::now();
        }

        return null;
    }
}
