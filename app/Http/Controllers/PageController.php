<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $slug)
    {
        $destination = Destination::where('status', 'active')
            ->where('slug', $slug)
            ->first();

        if ($destination) {
            return view('destination', compact('destination'));
        }

        $post = Post::where('status', 'published')
            ->where('slug', $slug)
            ->first();

        if ($post) {
            return view('blog-page', compact('post'));
        }

        abort(404);
    }
}
