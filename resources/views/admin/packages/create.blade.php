@extends('admin.layouts.app', ['title' => 'Add New Package'])

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

        <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data" id="packageForm">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                    required>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Activities</label>
                                        <input type="text" name="activities" class="form-control"
                                            value="{{ old('activities') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fitness Level</label>
                                        <input type="text" name="fitness_level" class="form-control"
                                            value="{{ old('fitness_level') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Max Elevation</label>
                                        <input type="text" name="max_elevation" class="form-control"
                                            value="{{ old('max_elevation') }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Best Time</label>
                                        <input type="text" name="best_time" class="form-control"
                                            value="{{ old('best_time') }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Commute</label>
                                        <input type="text" name="commute" class="form-control"
                                            value="{{ old('commute') }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Group Size</label>
                                        <input type="text" name="group_size" class="form-control"
                                            value="{{ old('group_size') }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Arrival At</label>
                                        <input type="text" name="arrival_at" class="form-control"
                                            value="{{ old('arrival_at') }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Departure From</label>
                                        <input type="text" name="departure_from" class="form-control"
                                            value="{{ old('departure_from') }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Meal</label>
                                        <input type="text" name="meal" class="form-control"
                                            value="{{ old('meal') }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Tour Duration</label>
                                        <input type="text" name="tour_duration" class="form-control"
                                            value="{{ old('tour_duration') }}">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label>Stay</label>
                                        <input type="text" name="stay" class="form-control"
                                            value="{{ old('stay') }}">
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
                                <div class="departure-section border rounded p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0">Departure #1</h6>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="removeDepartureSection(this)" style="display: none;">Remove</button>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>From Date</label>
                                                <input type="date" name="departures[0][from_date]"
                                                    class="form-control" value="{{ old('departures.0.from_date') }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>To Date</label>
                                                <input type="date" name="departures[0][to_date]" class="form-control"
                                                    value="{{ old('departures.0.to_date') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label>Available Days</label>
                                        <div class="d-flex flex-wrap">
                                            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="departures[0][days][]" value="{{ strtolower($day) }}"
                                                        {{ old('departures.0.days') && in_array(strtolower($day), old('departures.0.days')) ? 'checked' : '' }}>
                                                    <label class="form-check-label mr-2">{{ $day }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
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
                                <textarea name="overview" id="overview-editor" class="form-control" rows="5">{{ old('overview') }}</textarea>
                            </div>


                            <div class="form-group mt-3">
                                <label>Detailed Itinerary</label>
                                <textarea name="itinerary" class="form-control" rows="10"
                                    placeholder="## Day 1 - Arrival and Welcome
Start your journey with hotel check-in and welcome dinner.

## Day 2 - City Tour
Morning sightseeing of major attractions followed by free time for shopping.

## Day 3 - Mountain Trek
Early morning trek to scenic viewpoints with packed lunch.">{{ old('itinerary') }}</textarea>
                                <small class="text-muted">Use ## followed by heading text for each day/section title, then
                                    add details in new line below</small>
                            </div>

                            <div class="form-group mt-3">
                                <label>FAQs</label>
                                <textarea name="faqs" class="form-control" rows="5"
                                    placeholder="## What is the best time to visit?
The best season is from March to May when the weather is pleasant.

## Do I need travel insurance?
Yes, we highly recommend getting travel insurance to cover any emergencies.

## What should I pack?
Comfortable walking shoes, warm clothes, and basic medications.">{{ old('faqs') }}</textarea>
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
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label>Destination</label>
                                <select name="destination_id" class="form-control" id="destination-select" required>
                                    <option value="">Select Destination</option>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}"
                                            {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
                                            {{ $destination->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label>Place</label>
                                <select name="place_id" class="form-control" id="place-select" required>
                                    <option value="">Select Place</option>
                                    @if (old('destination_id'))
                                        @foreach ($places->where('destination_id', old('destination_id')) as $place)
                                            <option value="{{ $place->id }}"
                                                {{ old('place_id') == $place->id ? 'selected' : '' }}>
                                                {{ $place->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Create Package</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Pricing</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Regular Price</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price') }}"
                                    step="0.01" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>Sale Price (Per Person)</label>
                                <input type="number" name="sale_price_per_person" class="form-control"
                                    value="{{ old('sale_price_per_person') }}" step="0.01" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>2+ People Price (Per Person)</label>
                                <input type="number" name="sale_price_two_plus_per_person" class="form-control"
                                    value="{{ old('sale_price_two_plus_per_person') }}" step="0.01">
                            </div>
                            <div class="form-group mt-3">
                                <label>8+ People Price (Per Person)</label>
                                <input type="number" name="sale_price_eight_plus_per_person" class="form-control"
                                    value="{{ old('sale_price_eight_plus_per_person') }}" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Gallery Images</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="gallery-inputs">
                                    <div class="mb-2">
                                        <div class="d-flex">
                                            <input type="file" name="gallery[]" class="form-control" accept="image/*"
                                                onchange="previewImage(this)">
                                        </div>
                                        <img class="preview-image mt-2" style="max-width: 100px; display: none;">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary btn-sm" onclick="addGalleryInput()">Add
                                    Image</button>
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
                                                {{ old('categories') && in_array($category->id, old('categories')) ? 'checked' : '' }}>
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
                                    value="{{ old('meta_title') }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control"
                                    value="{{ old('meta_keywords') }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description') }}</textarea>
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
        ClassicEditor
            .create(document.querySelector('#overview-editor'), {
                simpleUpload: {
                    uploadUrl: "{{ route('admin.ck-upload', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

        // Create a mapping of places by destination
        const placesByDestination = @json($places->groupBy('destination_id'));

        document.getElementById('destination-select').addEventListener('change', function() {
            const destinationId = this.value;
            const placeSelect = document.getElementById('place-select');

            // Clear current options
            placeSelect.innerHTML = '<option value="">Select Place</option>';

            if (destinationId && placesByDestination[destinationId]) {
                placesByDestination[destinationId].forEach(place => {
                    const option = document.createElement('option');
                    option.value = place.id;
                    option.textContent = place.name;
                    placeSelect.appendChild(option);
                });
            }
        });

        function previewImage(input) {
            if (input.files && input.files[0]) {
                // Find the closest .mb-2 container and then find the preview image within it
                const container = input.closest('.mb-2');
                const preview = container.querySelector('.preview-image');

                if (preview) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        }

        function addGalleryInput() {
            const container = document.querySelector('.gallery-inputs');
            const div = document.createElement('div');
            div.className = 'mb-2';
            div.innerHTML = `
        <div class="d-flex">
            <input type="file" name="gallery[]" class="form-control" accept="image/*" onchange="previewImage(this)">
            <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeGalleryInput(this)">Remove</button>
        </div>
        <img class="preview-image mt-2" style="max-width: 100px; display: none;">
    `;
            container.appendChild(div);
        }

        function removeGalleryInput(button) {
            button.closest('.mb-2').remove();
        }

        // Initialize event listeners
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input[name="gallery[]"]').forEach(input => {
                input.addEventListener('change', function() {
                    previewImage(this);
                });
            });
        });


        let departureCount = 1;

        function addDepartureSection() {
            departureCount++;
            const container = document.getElementById('departures-container');
            const template = `
            <div class="departure-section border rounded p-3 mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">Departure #${departureCount}</h6>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeDepartureSection(this)">Remove</button>
                </div>
                <div class="row">
                    <div class="col-md-6">
    <div class="form-group">
                    <label>From Date</label>
                    <input type="date" name="departures[${departureCount - 1}][from_date]" class="form-control" required>
                </div>
                </div>
                <div class="col-md-6">
                       <div class="form-group">
                    <label>To Date</label>
                    <input type="date" name="departures[${departureCount - 1}][to_date]" class="form-control" required>
                </div>
                    </div>
                </div>


                <div class="form-group mt-2">
                    <label>Available Days</label>
                    <div class="d-flex flex-wrap">
                        ${['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
                            .map(day => `
                                                                                                                                                                                                            <div class="form-check me-3">
                                                                                                                                                                                                                <input class="form-check-input" type="checkbox"
                                                                                                                                                                                                                       name="departures[${departureCount - 1}][days][]"
                                                                                                                                                                                                                       value="${day.toLowerCase()}">
                                                                                                                                                                                                                <label class="form-check-label mr-2">${day}</label>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        `).join('')}
                    </div>
                </div>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', template);

            // Show remove buttons if there's more than one departure
            updateRemoveButtons();
        }

        function removeDepartureSection(button) {
            button.closest('.departure-section').remove();
            departureCount--;

            // Update departure numbers
            document.querySelectorAll('.departure-section').forEach((section, index) => {
                section.querySelector('h6').textContent = `Departure #${index + 1}`;
                updateInputNames(section, index);
            });

            // Update remove buttons visibility
            updateRemoveButtons();
        }

        function updateRemoveButtons() {
            const removeButtons = document.querySelectorAll('.departure-section .btn-danger');
            removeButtons.forEach(button => {
                button.style.display = document.querySelectorAll('.departure-section').length > 1 ? 'block' :
                    'none';
            });
        }

        function updateInputNames(section, index) {
            section.querySelectorAll('input[name*="departures"]').forEach(input => {
                const name = input.getAttribute('name');
                input.setAttribute('name', name.replace(/departures\[\d+\]/, `departures[${index}]`));
            });
        }
    </script>
@endpush


@push('style')
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>
@endpush
