@extends('admin.layouts.app', ['title' => 'Add New Departure'])

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

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.departures.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Package</label>
                        <select name="package_id" class="form-control" required>
                            <option value="">Select Package</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}"
                                    {{ old('package_id') == $package->id ? 'selected' : '' }}>
                                    {{ $package->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mt-3">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group mt-3">
                                <label>End Date</label>
                                <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group mt-3">
                                <label>Total Seats</label>
                                <input type="number" name="total_seats" class="form-control"
                                    value="{{ old('total_seats', 20) }}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group mt-3">
                                <label>Booked Seats</label>
                                <input type="number" name="booked_seats" class="form-control"
                                    value="{{ old('booked_seats', 0) }}" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="show_on_home_page"
                                    id="showOnHomePage">
                                <label class="form-check-label" for="showOnHomePage">
                                    Show on home page
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Create Departure</button>
                        <a href="{{ route('admin.departures.index') }}" class="btn btn-link">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
