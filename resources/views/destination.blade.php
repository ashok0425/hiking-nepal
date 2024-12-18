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

    <section class="container py-5 mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-5" style="max-width:600px;">
                    <h2>Trip Search</h2>
                    <p>Findout trips that fits based around your interests, tastes, and budget.</p>
                </div>

                <form action="" method="GET" class="row row-cols-lg-auto g-4 align-items-center">
                    <div class="col-12">
                        <label class="form-label">KEYWORDS</label>
                        <div class="input-group">
                            <span class="input-group-text text-primary" id="basic-addon1">
                                <i class="fas fa-search"></i>
                            </span>
                            <input class="form-control ps-0 border-start-0" type="text" placeholder="Find you trip"
                                required>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">CATEGORY</label>
                        <select name="activity" class="form-select border" style="min-width: 200px">
                            <option value="">Any</option>
                            <option value="trekking">Trekking</option>
                            <option value="hiking">Hiking</option>
                            <option value="climbing">Climbing</option>
                            <option value="expedition">Expedition</option>
                        </select>
                    </div>
                    {{-- <div class="col-12">
                        <label class="form-label">STYLES</label>
                        <select name="style" class="form-select border">
                            <option value="">Any</option>
                            <option value="budget">Budget</option>
                            <option value="comfort">Comfort</option>
                            <option value="luxury">Luxury</option>
                        </select>
                    </div> --}}
                </form>
            </div>
        </div>
    </section>

    @foreach ($packagesByCategories as $packagesByCategory)
        <section class="container py-5 mb-5 expandable-content" id="category-{{ $packagesByCategory['slug'] }}">
            <div class="mb-5" style="max-width: 600px;">
                <h2>{{ $packagesByCategory['name'] }}</h2>
                <p>{{ $packagesByCategory['tagline'] }}</p>
            </div>

            <div class="row gy-4 mb-4 initial-content">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col-md-4">
                        <x-package-card />
                    </div>
                @endfor
            </div>

            <div class="collapse expandable-section">
                <div class="row gy-4">
                    @for ($i = 3; $i < 5; $i++)
                        <div class="col-md-4">
                            <x-package-card />
                        </div>
                    @endfor
                </div>
            </div>

            <div class="text-center mt-5">
                <button class="btn btn-primary expand-toggle" type="button">
                    <span class="show-more-text">Show More <i class="fas fa-chevron-down ms-1"></i></span>
                    <span class="show-less-text d-none">Show Less <i class="fas fa-chevron-up ms-1"></i></span>
                </button>
            </div>
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
