<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsletterPostController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsletterPost::latest('created_at');

        if ($request->has('q')) {
            $searchTerm = $request->q;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%");
            });
        }

        $newsletterPosts = $query->paginate()->withQueryString();

        return view('admin.newsletter-posts.index', compact('newsletterPosts'));
    }

    public function create()
    {
        return view('admin.newsletter-posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image_url' => 'nullable|image|max:2048|required_if:status,published',
        ]);

        if ($request->hasFile('image_url')) {
            $validated['image_url'] = $request->file('image_url')->store('newsletter-posts/images', 'public');
        }

        $validated['published_at'] = $this->getPublishedAt($request->status, $request->published_at);
        NewsletterPost::create($validated);

        return redirect()->route('admin.newsletter-posts.index')->with('success', 'Newsletter Post created successfully');
    }

    public function edit(NewsletterPost $newsletterPost)
    {
        return view('admin.newsletter-posts.edit', compact('newsletterPost'));
    }

    public function update(Request $request, NewsletterPost $newsletterPost)
    {
        // Check if the post is already published and prevent further edits
        if ($newsletterPost->status === 'published') {
            return redirect()->route('admin.newsletter-posts.edit', $newsletterPost->id)
                ->with('error', 'Published newsletter posts cannot be edited');
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published',
            'image_url' => ['nullable', 'image', 'max:2048', $newsletterPost->image_url ? '' : 'required_if:status,published'],
        ]);

        if ($request->hasFile('image_url')) {
            if ($newsletterPost->getRawOriginal('image_url')) {
                Storage::disk('public')->delete($newsletterPost->getRawOriginal('image_url'));
            }
            $validated['image_url'] = $request->file('image_url')->store('newsletter-posts/images', 'public');
        }

        $validated['published_at'] = $this->getPublishedAt($request->status, $request->published_at);
        $newsletterPost->update($validated);

        return redirect()->route('admin.newsletter-posts.index')->with('success', 'Newsletter Post updated successfully');
    }

    public function destroy(NewsletterPost $newsletterPost)
    {
        if ($newsletterPost->getRawOriginal('image_url')) {
            Storage::disk('public')->delete($newsletterPost->getRawOriginal('image_url'));
        }

        $newsletterPost->delete();

        return redirect()->route('admin.newsletter-posts.index')->with('success', 'Newsletter Post deleted successfully');
    }

    private function getPublishedAt($status, $publishedAt)
    {
        if ($status === 'published') {
            return $publishedAt ?? Carbon::now();
        }

        return null;
    }
}
