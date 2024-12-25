<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialEmbed;
use Illuminate\Http\Request;

class SocialEmbedController extends Controller
{
    public function index(Request $request)
    {
        $query = SocialEmbed::query();

        if ($request->has('q')) {
            $searchTerm = $request->query('q');
            $query->where('title', 'LIKE', "%{$searchTerm}%");
        }

        $socialEmbeds = $query->orderBy('created_at', 'desc')->get();

        return view('admin.social-embeds.index', compact('socialEmbeds'));
    }

    public function create()
    {
        return view('admin.social-embeds.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'source' => 'required|max:255',
            'body' => 'required',
        ]);

        SocialEmbed::create($validated);

        return redirect()->route('admin.social-embeds.index')
            ->with('success', 'Social Embed created successfully');
    }

    public function edit(SocialEmbed $socialEmbed)
    {
        return view('admin.social-embeds.edit', compact('socialEmbed'));
    }

    public function update(Request $request, SocialEmbed $socialEmbed)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'source' => 'required|max:255',
            'body' => 'required',
        ]);

        $socialEmbed->update($validated);

        return redirect()->route('admin.social-embeds.index')
            ->with('success', 'Social Embed updated successfully');
    }

    public function destroy(SocialEmbed $socialEmbed)
    {
        $socialEmbed->delete();

        return redirect()->route('admin.social-embeds.index')
            ->with('success', 'Social Embed deleted successfully');
    }
}
