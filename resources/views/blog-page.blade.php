@extends('layouts.website')

@section('title', $post->meta_title ?? $post->title)
@section('meta')
    <meta name="description" content="{{ $post->meta_description }}">
    <meta name="keywords" content="{{ $post->meta_keywords }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $post->meta_title ?? $post->title }}">
    <meta property="og:description" content="{{ $post->meta_description }}">
    <meta property="og:image"
        content="{{ Str::startsWith($post->thumbnail, 'http') ? $post->thumbnail : asset($post->thumbnail) }}">
@endsection

@section('content')
    <section class="position-relative overflow-hidden d-flex justify-content-center align-items-center"
        style="height: 330px;">
        <img src="{{ Str::startsWith($post->cover ?? $post->thumbnail, 'http') ? $post->cover ?? $post->thumbnail : asset($post->cover ?? $post->thumbnail) }}"
            alt="{{ $post->title }}" class="w-100 position-absolute start-0 top-0"
            style="height: 330px; object-fit:cover; filter: brightness(30%) contrast(100%);">
        <div class="container">
            <h1 class="mb-0 z-1 position-relative text-uppercase text-white text-center">{{ $post->title }}</h1>
        </div>
    </section>
    <div class="container py-5 my-5">
        <div class="row gy-4">
            <div class="col-md-9">
                <section>

                    <div class="blog-post-meta mb-4">
                        <span class="text-muted">
                            <i class="far fa-calendar-alt me-2"></i>
                            {{ $post->published_at->format('F j, Y') }}
                        </span>
                    </div>

                    <article class="blog-content">
                        {!! $post->content !!}
                    </article>
                </section>

                <section class="py-md-5">
                    <h2 class="mb-5">You may also be interested in
                    </h2>

                    <div class="row">
                        @foreach (App\Models\Post::getRecentPosts() as $post)
                            <div class="col-md-6">
                                <x-blog-card :post="$post" />
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>

            <div class="col-md-3">
                <form action="{{ route('blog') }}" method="GET" class="mb-5">
                    <div class="input-group mb-3">
                        <span class="input-group-text text-primary" id="basic-addon1">
                            <i class="fas fa-search"></i>
                        </span>
                        <input class="form-control ps-0 border-start-0" name="q" type="text"
                            placeholder="Search Blog" value="{{ request()->query('q') }}" required>
                    </div>
                </form>

                <p class="fw-bold">RECENT POSTS</p>
                <ul class="list-group list-group-flush mb-5">
                    @foreach (App\Models\Post::getRecentPosts(6) as $recentPost)
                        <li class="list-group-item">
                            <a href="{{ route('blog-page', $recentPost->slug) }}" class="text-decoration-none text-dark">
                                {{ $recentPost->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @include('inc.book-a-call-cta')
@endsection
