@extends('admin.layouts.app', ['title' => 'Edit Departure'])

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
                <form action="{{ route('admin.departures.update', $departure) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Package</label>
                        <select name="package_id" class="form-control" required>
                            <option value="">Select Package</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}"
                                    {{ old('package_id', $departure->package_id) == $package->id ? 'selected' : '' }}>
                                    {{ $package->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control"
                            value="{{ old('start_date', $departure->start_date->format('Y-m-d')) }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control"
                            value="{{ old('end_date', $departure->end_date->format('Y-m-d')) }}" required>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Update Departure</button>
                        <a href="{{ route('admin.departures.index') }}" class="btn btn-link">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
