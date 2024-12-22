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

            {{-- <div class="col-12">
                <label class="form-label">ACTIVITY</label>
                <select name="activity" class="form-select border">
                    <option value="">Any</option>
                    @foreach ($activities as $activity)
                        <option value="{{ $activity->id }}" {{ request('activity') == $activity->id ? 'selected' : '' }}>
                            {{ $activity->name }}
                        </option>
                    @endforeach
                </select>
            </div> --}}

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
                    {{ !request('destination') ? 'disabled' : '' }}>
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
    @endif

    @foreach ($packageCategories as $packageCategory)
        <section class="container py-5 mb-5 expandable-content">
            <div class="mb-5" style="max-width: 600px;">
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
