@extends('layouts.website')

@section('title', 'Hiking Nepal')

@section('content')
    <section class="position-relative overflow-hidden d-flex justify-content-center align-items-center"
        style="height: 330px;">
        <img src="{{ asset('images/head-cover.jpeg') }}" alt="head cover" class="w-100 position-absolute start-0 top-0"
            style="height: 330px; object-fit:cover; filter: brightness(80%) contrast(110%);">
        <div class="container">
            <h1 class="mb-0 z-1 position-relative text-uppercase text-white text-center">DEALS</h1>
        </div>
    </section>

    <section class="container py-5 mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-5" style="max-width:600px;">
                    <h2>Deals & Offers Search</h2>
                    <p>Findout deals and offers that are ongoing. These deals and offers are limited for a certain period of
                        time.</p>
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
                        <label class="form-label">ACTIVITY</label>
                        <select name="activity" class="form-select border">
                            <option value="">Any</option>
                            <option value="trekking">Trekking</option>
                            <option value="hiking">Hiking</option>
                            <option value="climbing">Climbing</option>
                            <option value="expedition">Expedition</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">STYLES</label>
                        <select name="style" class="form-select border">
                            <option value="">Any</option>
                            <option value="budget">Budget</option>
                            <option value="comfort">Comfort</option>
                            <option value="luxury">Luxury</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="container py-5 mb-5 expandable-content">
        <div class="mb-5" style="max-width: 600px;">
            <h2>Nature And Wildlife</h2>
            <p>Findout trips that fits based around your interests, tastes, and budget.</p>
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

    <section class="container py-5 mb-5 expandable-content">
        <div class="mb-5" style="max-width: 600px;">
            <h2>Expedition</h2>
            <p>Findout trips that fits based around your interests, tastes, and budget.</p>
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
