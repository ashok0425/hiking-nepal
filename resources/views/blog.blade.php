@extends('layouts.website')

@section('title', 'Hiking Nepal')

@section('content')
    <section class="position-relative overflow-hidden d-flex justify-content-center align-items-center"
        style="height: 330px;">
        <img src="{{ asset('images/head-cover.jpeg') }}" alt="head cover" class="w-100 position-absolute start-0 top-0"
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
