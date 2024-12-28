@extends('layouts.website')

@section('title', $destination->meta_title ?? $destination->name)

@section('meta')
    <meta name="description" content="{{ $destination->meta_description }}">
    <meta name="keywords" content="{{ $destination->meta_keyword }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $destination->meta_title ?? $destination->name }}">
    <meta property="og:description" content="{{ $destination->meta_description }}">
    <meta property="og:image" content="{{ $destination->cover }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $destination->meta_title ?? $destination->name }}">
    <meta property="twitter:description" content="{{ $destination->meta_description }}">
    <meta property="twitter:image" content="{{ $destination->cover }}">
@endsection

@section('content')
    <div class="position-relative" style="height: 60vh;">
        <img src="{{ $destination->cover }}" alt="product category" class="w-100 h-100 object-fit-cover position-absolute"
            style="object-position: center center;">
    </div>
    <section class="py-5 my-5 container text-center">
        <div class="mx-auto" style="max-width: 800px;">
            <div class="head-lines text-center mb-5">
                <div class="head-line-bg"></div>
                <h1 class="mb-0 bg-white text-uppercase head-line-head">{{ $destination->slug }}
                </h1>
                <p>{{ $destination->tagline }}</p>
            </div>
        </div>

        <p>{{ $destination->desc }}</p>
    </section>

    @foreach ($packagesByPlaces as $packagesByPlace)
        <section class="container mb-5 expandable-content" id="place-{{ $packagesByPlace['slug'] }}">
            <div class="mb-5" style="max-width: 600px;">
                <div class="d-flex align-items-center gap-4 mb-3">
                    @if ($packagesByPlace['cover'])
                        <img src="{{ $packagesByPlace['cover'] }}" alt="{{ $packagesByPlace['name'] }}"
                            class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                    @endif
                    <h2 class="mb-0">{{ $packagesByPlace['name'] }}</h2>
                </div>
                <p>{{ $packagesByPlace['description'] }}</p>
            </div>

            <div class="row gy-4 mb-4 initial-content">
                @foreach ($packagesByPlace['packages']->take(3) as $package)
                    <div class="col-md-4">
                        <x-package-card :package="$package" :destination="$destination" />
                    </div>
                @endforeach
            </div>

            <div class="collapse expandable-section">
                <div class="row gy-4">
                    @foreach ($packagesByPlace['packages']->skip(3) as $package)
                        <div class="col-md-4">
                            <x-package-card :package="$package" :destination="$destination" />
                        </div>
                    @endforeach
                </div>
            </div>

            @if ($packagesByPlace['packages']->count() > 3)
                <div class="text-center mt-5">
                    <button class="btn btn-primary expand-toggle" type="button">
                        <span class="show-more-text">Show More <i class="fas fa-chevron-down ms-1"></i></span>
                        <span class="show-less-text d-none">Show Less <i class="fas fa-chevron-up ms-1"></i></span>
                    </button>
                </div>
            @endif
        </section>
    @endforeach

    @foreach ($packagesByCategories as $packagesByCategory)
        <section class="container mb-5 expandable-content" id="category-{{ $packagesByCategory['slug'] }}">
            <div class="mb-5" style="max-width: 600px;">
                <h2>{{ $packagesByCategory['name'] }}</h2>
                <p>{{ $packagesByCategory['tagline'] }}</p>
            </div>

            <div class="row gy-4 mb-4 initial-content">
                @foreach ($packagesByCategory['packages']->take(3) as $package)
                    <div class="col-md-4">
                        <x-package-card :package="$package" :destination="$destination" />
                    </div>
                @endforeach
            </div>

            <div class="collapse expandable-section">
                <div class="row gy-4">
                    @foreach ($packagesByCategory['packages']->skip(3) as $package)
                        <div class="col-md-4">
                            <x-package-card :package="$package" :destination="$destination" />
                        </div>
                    @endforeach
                </div>
            </div>

            @if ($packagesByCategory['packages']->count() > 3)
                <div class="text-center mt-5">
                    <button class="btn btn-primary expand-toggle" type="button">
                        <span class="show-more-text">Show More <i class="fas fa-chevron-down ms-1"></i></span>
                        <span class="show-less-text d-none">Show Less <i class="fas fa-chevron-up ms-1"></i></span>
                    </button>
                </div>
            @endif
        </section>
    @endforeach

    @foreach ($packagesByActivities as $packagesByActivity)
        <section class="container mb-5 expandable-content" id="activity-{{ $packagesByActivity['slug'] }}">
            <div class="mb-5" style="max-width: 600px;">
                <h2>{{ $packagesByActivity['name'] }}</h2>
                <p>{{ $packagesByActivity['description'] }}</p>
            </div>

            <div class="row gy-4 mb-4 initial-content">
                @foreach ($packagesByActivity['packages']->take(3) as $package)
                    <div class="col-md-4">
                        <x-package-card :package="$package" :destination="$destination" />
                    </div>
                @endforeach
            </div>

            <div class="collapse expandable-section">
                <div class="row gy-4">
                    @foreach ($packagesByActivity['packages']->skip(3) as $package)
                        <div class="col-md-4">
                            <x-package-card :package="$package" :destination="$destination" />
                        </div>
                    @endforeach
                </div>
            </div>

            @if ($packagesByActivity['packages']->count() > 3)
                <div class="text-center mt-5">
                    <button class="btn btn-primary expand-toggle" type="button">
                        <span class="show-more-text">Show More <i class="fas fa-chevron-down ms-1"></i></span>
                        <span class="show-less-text d-none">Show Less <i class="fas fa-chevron-up ms-1"></i></span>
                    </button>
                </div>
            @endif
        </section>
    @endforeach

    @include('inc.book-a-call-cta')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const expandableSections = document.querySelectorAll('.expandable-content');
            expandableSections.forEach(section => {
                const expandableContent = section.querySelector('.expandable-section');
                const toggleButton = section.querySelector('.expand-toggle');
                const showMoreText = toggleButton.querySelector('.show-more-text');
                const showLessText = toggleButton.querySelector('.show-less-text');

                const collapse = new bootstrap.Collapse(expandableContent, {
                    toggle: false
                });

                toggleButton.addEventListener('click', () => {
                    if (expandableContent.classList.contains('show')) {
                        collapse.hide();
                        showMoreText.classList.remove('d-none');
                        showLessText.classList.add('d-none');
                    } else {
                        collapse.show();
                        showMoreText.classList.add('d-none');
                        showLessText.classList.remove('d-none');
                    }
                });
            });
        });
    </script>
@endpush
