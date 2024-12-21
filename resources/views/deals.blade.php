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
            <h2>Deals & Offers Search</h2>
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
                        <option value="{{ $destination->id }}"
                            {{ request('destination') == $destination->id ? 'selected' : '' }}>
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
                            <option value="{{ $place->id }}" {{ request('place') == $place->id ? 'selected' : '' }}>
                                {{ $place->name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </section>

    <section class="container py-5 mb-5 expandable-content">
        <div class="mb-5" style="max-width: 600px;">
            <h2>Nature And Wildlife</h2>
            <p>Findout trips that fits based around your interests, tastes, and budget.</p>
        </div>

        <div class="row gy-4 mb-4 initial-content">
            @foreach ($packages as $package)
                <div class="col-md-4">
                    <x-package-card :package="$package" />
                </div>
            @endforeach
        </div>

        <div class="collapse expandable-section">
            <div class="row gy-4">
                @foreach ($packages as $package)
                    <div class="col-md-4">
                        <x-package-card :package="$package" />
                    </div>
                @endforeach
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
            @foreach ($packages as $package)
                <div class="col-md-4">
                    <x-package-card :package="$package" />
                </div>
            @endforeach
        </div>

        <div class="collapse expandable-section">
            <div class="row gy-4">
                @foreach ($packages as $package)
                    <div class="col-md-4">
                        <x-package-card :package="$package" />
                    </div>
                @endforeach
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const destinationSelect = document.getElementById('destination-select');
            const placeSelect = document.getElementById('place-select');
            const places = @json($allPlaces);

            function updatePlaces(destinationId) {
                placeSelect.disabled = !destinationId;
                placeSelect.innerHTML = '<option value="">Any</option>';

                if (destinationId) {
                    const filteredPlaces = places.filter(place => place.destination_id == destinationId);
                    filteredPlaces.forEach(place => {
                        const option = document.createElement('option');
                        option.value = place.id;
                        option.textContent = place.name;
                        if (place.id == '{{ request('place') }}') {
                            option.selected = true;
                        }
                        placeSelect.appendChild(option);
                    });
                }
            }

            destinationSelect.addEventListener('change', function() {
                updatePlaces(this.value);
            });

            // Initialize places if destination is selected
            if (destinationSelect.value) {
                updatePlaces(destinationSelect.value);
            }
        });
    </script>
@endpush
