@extends('layouts.website')

@section('title', 'Travel Blogs')

@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="Read our travel blogs about trekking and hiking adventures in Nepal. Get insights, tips, and stories from experienced trekkers exploring Nepal's breathtaking trails and mountains.">
    <meta name="keywords"
        content="nepal travel blog, nepal trekking blog, hiking nepal blog, nepal hiking stories, nepal trekking experiences, nepal adventure blog">
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="Travel Blogs - Hiking Nepal">
    <meta property="og:description"
        content="Read our travel blogs about trekking and hiking adventures in Nepal. Get insights, tips, and stories from experienced trekkers exploring Nepal's breathtaking trails and mountains.">
    <meta property="og:image" content="{{ asset('images/deals-cover.jpeg') }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Travel Blogs - Hiking Nepal">
    <meta name="twitter:description"
        content="Read our travel blogs about trekking and hiking adventures in Nepal. Get insights, tips, and stories from experienced trekkers exploring Nepal's breathtaking trails and mountains.">
    <meta name="twitter:image" content="{{ asset('images/deals-cover.jpeg') }}">
@endsection

@section('content')
    <section class="position-relative overflow-hidden d-flex justify-content-center align-items-center"
        style="height: 330px;">
        <img src="{{ asset('images/deals-cover.jpeg') }}" alt="head cover" class="w-100 position-absolute start-0 top-0"
            style="height: 330px; object-fit:cover; filter: brightness(80%) contrast(110%);">
        <div class="container">
            <h1 class="mb-0 z-1 position-relative text-uppercase text-white text-center">TRAVEL BLOGS</h1>
        </div>
    </section>

    <section class="container py-5 my-5">
        <h2 class="text-center mb-4">
            Search Blog
        </h2>

        <form action="{{ route('blog') }}" method="GET" class="mb-5">
            <div class="input-group mb-3">
                <span class="input-group-text text-primary" id="basic-addon1">
                    <i class="fas fa-search"></i>
                </span>
                <input class="form-control ps-0 border-start-0" name="q" type="text" placeholder="Search Blog"
                    value="{{ request()->query('q') }}" required>
                @if (request()->query('q'))
                    <a href="{{ url()->current() }}" class="input-group-text text-danger" title="Clear search">
                        <i class="fas fa-times"></i>
                    </a>
                @endif
            </div>
        </form>

        <div class="row mb-4 gy-3">
            @forelse ($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <x-blog-card :post="$post" />
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No posts found.</p>
                </div>
            @endforelse
        </div>

        @if ($posts->count() > 0)
            <nav aria-label="Pagination">
                {{ $posts->links() }}
            </nav>
        @endif
    </section>

    @include('inc.book-a-call-cta')
@endsection
