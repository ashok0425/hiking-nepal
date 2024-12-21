@extends('admin.layouts.app', ['title' => 'Departures'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.departures.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search packages..."
                    value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q'))
                        <a href="{{ route('admin.departures.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.departures.create') }}" class="btn btn-primary">Add New Departure</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Package</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departures as $departure)
                    <tr>
                        <td>{{ $departure->package->title }}</td>
                        <td>{{ $departure->start_date->format('M d, Y') }}</td>
                        <td>{{ $departure->end_date->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.departures.edit', $departure) }}" class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.departures.destroy', $departure) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this departure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No departures found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
