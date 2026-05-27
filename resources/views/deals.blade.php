@extends('layouts.website')

@section('title', 'Search Deals and Offers')

@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="Find exclusive deals and offers on travel packages. Browse limited time discounts and special offers on tours, treks and adventures.">
    <meta name="keywords" content="travel deals, tour offers, holiday packages, travel discounts, special offers">
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="Search Deals and Offers">
    <meta property="og:description"
        content="Find exclusive deals and offers on travel packages. Browse limited time discounts and special offers on tours, treks and adventures.">
    <meta property="og:image" content="{{ asset('images/deals-cover.webp') }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Search Deals and Offers">
    <meta name="twitter:description"
        content="Find exclusive deals and offers on travel packages. Browse limited time discounts and special offers on tours, treks and adventures.">
    <meta name="twitter:image" content="{{ asset('images/deals-cover.webp') }}">
@endsection

@section('content')
    <x-yt-header title="Deals" />

    <section class="container mt-5">
        <div class="mb-5" style="max-width:600px;">
            <h2>Search Deals & Offers</h2>
            <p>Findout deals and offers that are ongoing. These deals and offers are limited for a certain period of
                time.</p>
        </div>

        <form action="" method="GET" class="row row-cols-lg-auto g-4 align-items-end">
            <div class="col-12">
                <label class="form-label">KEYWORDS</label>
                <div class="input-group">
                    <span class="input-group-text text-primary" id="basic-addon1">
                        <i class="fas fa-search"></i>
                    </span>
                    <input name="search" value="{{ request('search') }}" class="form-control ps-0 border-start-0"
                        type="text" placeholder="Find your trip">
                </div>
            </div>

            <div class="col-12">
                <label class="form-label">ACTIVITY</label>
                <select name="activity" class="form-select border">
                    <option value="">Any</option>
                    @foreach ($activities as $activity)
                        <option value="{{ $activity->id }}" {{ request('activity') == $activity->id ? 'selected' : '' }}>
                            {{ $activity->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <label class="form-label">DESTINATION</label>
                <select name="destination" class="form-select border" id="destination-select">
                    <option value="">Any</option>
                    @foreach ($destinations as $destination)
                        <option value="{{ $destination->slug }}"
                            {{ request('destination') == $destination->slug ? 'selected' : '' }}>
                            {{ $destination->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <label class="form-label">PLACE</label>
                <select name="place" class="form-select border" id="place-select"
                    {{ !request('destination') ? 'disabled' : '' }} style="min-width: 100px">
                    <option value="">Any</option>
                    @if (request('destination'))
                        @foreach ($places as $place)
                            <option value="{{ $place->slug }}" {{ request('place') == $place->slug ? 'selected' : '' }}>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('deals') }}" class="btn btn-outline-secondary ms-2">Reset</a>
            </div>
        </form>
    </section>

    @if (count($packages) > 0)
        <div class="container py-5 mb-5">
            <div class="row mb-5 gy-4">
                @foreach ($packages as $package)
                    <div class="col-md-4">
                        <x-package-card :package="$package" />
                    </div>
                @endforeach
            </div>

            {{ $packages->links() }}
        </div>
    @elseif (request()->hasAny(['destination', 'place', 'activity', 'search']))
        <div class="container py-5 mb-5">
            <div class="text-center">
                <h3>No packages found</h3>
                <p class="text-muted">Try adjusting your search criteria or filters</p>
                <a href="{{ route('deals') }}" class="btn btn-primary mt-3">Clear all filters</a>
            </div>
        </div>
    @endif

    @foreach ($packageCategories as $packageCategory)
        <section class="container my-5 expandable-content">
            <div class="mb-4" style="max-width: 600px;">
                <h2>{{ $packageCategory->name }}</h2>
                <p>{{ $packageCategory->tagline }}</p>
            </div>

            <div class="row gy-4 mb-4 initial-content">
                @foreach ($packageCategory->packages->take(3) as $package)
                    <div class="col-md-4">
                        <x-package-card :package="$package" />
                    </div>
                @endforeach
            </div>

            <div class="collapse expandable-section">
                <div class="row gy-4">
                    @foreach ($packageCategory->packages->slice(3) as $package)
                        <div class="col-md-4">
                            <x-package-card :package="$package" />
                        </div>
                    @endforeach
                </div>
            </div>

            @if ($packageCategory->packages->count() > 3)
                <div class="text-center mt-5">
                    <button class="btn btn-primary expand-toggle" type="button">
                        <span class="show-more-text">Show More <i class="fas fa-chevron-down ms-1"></i></span>
                        <span class="show-less-text d-none">Show Less <i class="fas fa-chevron-up ms-1"></i></span>
                    </button>
                </div>
            @endif
        </section>
    @endforeach

    
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const destinationSelect = document.getElementById('destination-select');
            const placeSelect = document.getElementById('place-select');
            const places = @json($allPlaces);

            function updatePlaces(destinationSlug) {
                placeSelect.disabled = !destinationSlug;
                placeSelect.innerHTML = '<option value="">Any</option>';

                if (destinationSlug) {
                    const filteredPlaces = places.filter(place => place.destination_slug === destinationSlug);
                    filteredPlaces.forEach(place => {
                        const option = document.createElement('option');
                        option.value = place.slug;
                        option.textContent = place.name;

                        // Check if this place matches the currently selected place
                        if (place.slug === '{{ request('place') }}') {
                            option.selected = true;
                        }

                        placeSelect.appendChild(option);
                    });
                }
            }

            // Initial setup when the page loads
            if (destinationSelect.value) {
                updatePlaces(destinationSelect.value);
            }

            // Add event listener for destination change
            destinationSelect.addEventListener('change', function() {
                updatePlaces(this.value);
            });
        });
    </script>
@endpush
