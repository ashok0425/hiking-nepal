<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\SocialEmbed;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function whoWeAre()
    {
        $reviews = Review::where('status', 'approved')
            ->latest()
            ->take(10)
            ->get();

        $socialEmbeds = SocialEmbed::limit(3)->latest()->get();

        return view('who-we-are', compact('reviews', 'socialEmbeds'));
    }
}
