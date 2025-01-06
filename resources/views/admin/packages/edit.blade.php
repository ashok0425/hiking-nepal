@extends('admin.layouts.app', ['title' => 'Edit Package'])

@section('content')
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.packages.update', $package->id) }}" method="POST" enctype="multipart/form-data"
            id="packageForm">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $package->title) }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fitness Level</label>
                                        <input type="text" name="fitness_level" class="form-control"
                                            value="{{ old('fitness_level', $package->fitness_level) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Max Elevation</label>
                                        <input type="text" name="max_elevation" class="form-control"
                                            value="{{ old('max_elevation', $package->max_elevation) }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Best Time</label>
                                        <input type="text" name="best_time" class="form-control"
                                            value="{{ old('best_time', $package->best_time) }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Commute</label>
                                        <input type="text" name="commute" class="form-control"
                                            value="{{ old('commute', $package->commute) }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Group Size</label>
                                        <input type="text" name="group_size" class="form-control"
                                            value="{{ old('group_size', $package->group_size) }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Arrival At</label>
                                        <input type="text" name="arrival_at" class="form-control"
                                            value="{{ old('arrival_at', $package->arrival_at) }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Departure From</label>
                                        <input type="text" name="departure_from" class="form-control"
                                            value="{{ old('departure_from', $package->departure_from) }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Meal</label>
                                        <input type="text" name="meal" class="form-control"
                                            value="{{ old('meal', $package->meal) }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Tour Duration</label>
                                        <input type="text" name="tour_duration" class="form-control"
                                            value="{{ old('tour_duration', $package->tour_duration) }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Stay</label>
                                        <input type="text" name="stay" class="form-control"
                                            value="{{ old('stay', $package->stay) }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header d-flex justify-content-between align-items-center w-100">
                            <h5 class="mb-0 w-100">Departure Details</h5>
                            <div>
                                <button type="button" class="btn btn-secondary btn-sm"
                                    onclick="addDepartureSection()">Add</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="departures-container">
                                @if (old('departures'))
                                    @foreach (old('departures') as $index => $departure)
                                        <div class="departure-section mb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="date" name="departures[{{ $index }}][from_date]"
                                                        class="form-control" value="{{ $departure['from_date'] }}" required
                                                        onchange="updateEndDate(this)">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" name="departures[{{ $index }}][to_date]"
                                                        class="form-control" value="{{ $departure['to_date'] }}" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number"
                                                        name="departures[{{ $index }}][total_seats]"
                                                        class="form-control" value="{{ $departure['total_seats'] }}"
                                                        placeholder="Total Seats" required min="1">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number"
                                                        name="departures[{{ $index }}][booked_seats]"
                                                        class="form-control" value="{{ $departure['booked_seats'] }}"
                                                        placeholder="Booked Seats" required min="0">
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            name="departures[{{ $index }}][show_on_home_page]"
                                                            class="form-check-input" value="1"
                                                            {{ isset($departure['show_on_home_page']) ? 'checked' : '' }}>
                                                        <label class="form-check-label">Home</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger btn-sm w-100"
                                                        onclick="removeDepartureSection(this)"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach ($package->departures as $index => $departure)
                                        <div class="departure-section mb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="date"
                                                        name="departures[{{ $index }}][from_date]"
                                                        class="form-control"
                                                        value="{{ $departure->start_date->format('Y-m-d') }}" required
                                                        onchange="updateEndDate(this)">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="date" name="departures[{{ $index }}][to_date]"
                                                        class="form-control"
                                                        value="{{ $departure->end_date->format('Y-m-d') }}" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number"
                                                        name="departures[{{ $index }}][total_seats]"
                                                        class="form-control" value="{{ $departure->total_seats }}"
                                                        placeholder="Total Seats" required min="1">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="number"
                                                        name="departures[{{ $index }}][booked_seats]"
                                                        class="form-control" value="{{ $departure->booked_seats }}"
                                                        placeholder="Booked Seats" required min="0">
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            name="departures[{{ $index }}][show_on_home_page]"
                                                            class="form-check-input" value="1"
                                                            {{ $departure->show_on_home_page ? 'checked' : '' }}>
                                                        <label class="form-check-label">Home</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger btn-sm w-100"
                                                        onclick="removeDepartureSection(this)"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="mb-0">Package Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Overview</label>
                                <textarea name="overview" id="overview-editor" class="form-control" rows="5">{{ old('overview', $package->overview) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Perks</label>
                                <textarea name="perks" class="form-control" rows="3" placeholder="Enter comma-separated perks">{{ old('perks', $package->perks) }}</textarea>
                                <small class="text-muted">Enter perks separated by commas (e.g., Free WiFi, Breakfast,
                                    Airport Pickup)</small>
                            </div>

                            <div class="form-group mt-3">
                                <label>Map Image</label>
                                @if ($package->map)
                                    <div class="mb-2">
                                        <img src="{{ Storage::disk('public')->url($package->map) }}"
                                            style="max-width: 200px" class="img-thumbnail">
                                        <div class="form-check mt-1">
                                            <input type="checkbox" name="remove_map" class="form-check-input"
                                                value="1">
                                            <label class="form-check-label">Remove existing map</label>
                                        </div>
                                    </div>
                                @endif
                                <input type="file" name="map" class="form-control" accept="image/*">
                            </div>

                            <div class="form-group mt-3">
                                <label>Altitude Chart</label>
                                @if ($package->alt_chart)
                                    <div class="mb-2">
                                        <img src="{{ Storage::disk('public')->url($package->alt_chart) }}"
                                            style="max-width: 200px" class="img-thumbnail">
                                        <div class="form-check mt-1">
                                            <input type="checkbox" name="remove_alt_chart" class="form-check-input"
                                                value="1">
                                            <label class="form-check-label">Remove existing chart</label>
                                        </div>
                                    </div>
                                @endif
                                <input type="file" name="alt_chart" class="form-control" accept="image/*">
                            </div>

                            <div class="form-group mt-3">
                                <label>Video URL</label>
                                <input type="url" name="video" class="form-control"
                                    placeholder="Enter YouTube video URL" value="{{ old('video', $package->video) }}">
                                <div class="small text-muted">Only paste embed URL Eg.
                                    https://www.youtube.com/embed/Tvms2DaG8UY</div>
                            </div>

                            <div class="form-group mt-3">
                                <label>Detailed Itinerary</label>
                                <textarea id="itinerary-editor" name="itinerary" class="form-control" rows="10">{{ old('itinerary', $package->itinerary) }}</textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label>FAQs</label>
                                <textarea name="faqs" class="form-control" rows="5"
                                    placeholder="## What is the best time to visit?
The best season is from March to May when the weather is pleasant.

## Do I need travel insurance?
Yes, we highly recommend getting travel insurance to cover any emergencies.

## What should I pack?
Comfortable walking shoes, warm clothes, and basic medications.">{{ old('faqs', $package->faqs) }}</textarea>
                                <small class="text-muted">Use ## followed by question text, then add the answer in new line
                                    below</small>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Package Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select name="status" class="form-control" required>
                                    <option value="draft"
                                        {{ old('status', $package->status) == 'draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>
                                    <option value="published"
                                        {{ old('status', $package->status) == 'published' ? 'selected' : '' }}>
                                        Published
                                    </option>
                                    <option value="private"
                                        {{ old('status', $package->status) == 'private' ? 'selected' : '' }}>
                                        Private
                                    </option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label>Destination</label>
                                <select name="destination_id" class="form-control" id="destination-select" required>
                                    <option value="">Select Destination</option>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}"
                                            {{ old('destination_id', $package->destination_id) == $destination->id ? 'selected' : '' }}>
                                            {{ $destination->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label>Place</label>
                                <select name="place_id" class="form-control" id="place-select" required>
                                    <option value="">Select Place</option>
                                    @if (old('destination_id', $package->destination_id))
                                        @foreach ($places->where('destination_id', old('destination_id', $package->destination_id)) as $place)
                                            <option value="{{ $place->id }}"
                                                {{ old('place_id', $package->place_id) == $place->id ? 'selected' : '' }}>
                                                {{ $place->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="show_in_nav" id="show_in_nav"
                                        value="1" {{ old('show_in_nav', $package->show_in_nav) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="show_in_nav">
                                        Show in Navigation
                                    </label>
                                    <small class="form-text text-muted">
                                        Enable this to display the package in navigation menus
                                    </small>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Package</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Pricing</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Discounted Price</label>
                                <input type="number" name="price" class="form-control"
                                    value="{{ old('price', $package->price) }}" step="0.01" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>Price (Per Person)</label>
                                <input type="number" name="sale_price_per_person" class="form-control"
                                    value="{{ old('sale_price_per_person', $package->sale_price_per_person) }}"
                                    step="0.01" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>2+ People Price (Per Person)</label>
                                <input type="number" name="sale_price_two_plus_per_person" class="form-control"
                                    value="{{ old('sale_price_two_plus_per_person', $package->sale_price_two_plus_per_person) }}"
                                    step="0.01">
                            </div>
                            <div class="form-group mt-3">
                                <label>8+ People Price (Per Person)</label>
                                <input type="number" name="sale_price_eight_plus_per_person" class="form-control"
                                    value="{{ old('sale_price_eight_plus_per_person', $package->sale_price_eight_plus_per_person) }}"
                                    step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Gallery Images</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <!-- Display existing images -->
                                @if ($package->gallery)
                                    <div class="existing-gallery mb-3">
                                        <div class="row">
                                            @foreach ($package->galleryImages() as $index => $imageUrl)
                                                <div class="col-md-4 mb-3">
                                                    <div class="position-relative">
                                                        <img src="{{ $imageUrl }}" class="img-fluid"
                                                            style="max-height: 150px;">
                                                        <div class="mt-2">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="remove_gallery[]"
                                                                    value="{{ $package->gallery[$index] }}"
                                                                    class="form-check-input">
                                                                <label class="form-check-label">Remove</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Add new images -->
                                <div class="gallery-inputs">
                                    <div class="mb-2">
                                        <div class="d-flex">
                                            <input type="file" name="new_gallery[]" class="form-control"
                                                accept="image/*" onchange="previewImage(this)">
                                            <button type="button" class="btn btn-danger btn-sm ms-2"
                                                onclick="removeGalleryInput(this)" style="display: none;">
                                                Remove
                                            </button>
                                        </div>
                                        <img class="preview-image mt-2" style="max-width: 100px; display: none;">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary btn-sm mt-2"
                                    onclick="addGalleryInput()">Add Image</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Activities</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="d-flex flex-wrap">
                                    @foreach ($activities as $activity)
                                        <div class="form-check me-3 mb-2">
                                            <input class="form-check-input" type="checkbox" name="activities[]"
                                                value="{{ $activity->id }}" id="activity{{ $activity->id }}"
                                                {{ in_array($activity->id, old('activities', $package->activities->pluck('id')->toArray())) ? 'checked' : '' }}>
                                            <label class="form-check-label mr-2" for="activity{{ $activity->id }}">
                                                {{ $activity->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Categories</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="d-flex flex-wrap">
                                    @foreach ($categories as $category)
                                        <div class="form-check me-3 mb-2">
                                            <input class="form-check-input" type="checkbox" name="categories[]"
                                                value="{{ $category->id }}" id="category{{ $category->id }}"
                                                {{ old('categories', $package->categories->pluck('id')->toArray()) && in_array($category->id, old('categories', $package->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                                            <label class="form-check-label mr-2" for="category{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">SEO Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control"
                                    value="{{ old('meta_title', $package->meta_title) }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control"
                                    value="{{ old('meta_keywords', $package->meta_keywords) }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $package->meta_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // Create a mapping of places by destination
        const placesByDestination = @json($places->groupBy('destination_id'));
        let departureCount = {{ count(old('departures', $package->departures ?? [])) ?: 1 }};
    </script>

    <script src="{{ asset('js/package.js') }}"></script>
@endpush

@push('style')
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>
@endpush
