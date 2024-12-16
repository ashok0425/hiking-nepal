<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->query('q');

        $posts = Post::where('status', '=', 'published')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('meta_title', 'LIKE', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(12);

        return view('blog', compact('posts'));
    }

    /**
     * Display the specified blog post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('status', '=', 'published')->where('slug', '=', $slug)->firstOrFail();

        return view('blog-page', compact('post'));
    }
}
