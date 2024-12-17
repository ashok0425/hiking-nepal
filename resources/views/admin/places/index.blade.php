@extends('admin.layouts.app', ['title' => 'Places'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.places.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search places..."
                    value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('search'))
                        <a href="{{ route('admin.places.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.places.create') }}" class="btn btn-primary">Add New Place</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Destination</th>
                    <th>Status</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($places as $place)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if ($place->cover)
                                    <img src="{{ $place->cover }}" alt="Cover" class="mr-2"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="mr-2 bg-secondary d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; border-radius: 4px;">
                                        <i class="fas fa-image text-white"></i>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ route('admin.places.edit', $place) }}"
                                        class="font-weight-bold text-dark">{{ $place->name }}</a>
                                    @if ($place->slug)
                                        <div class="small">
                                            <a href="#" class="text-muted"">
                                                {{ $place->slug }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>{{ $place->destination->name ?? 'N/A' }}</td>
                        <td>
                            <span class="badge badge-{{ $place->status === 'active' ? 'success' : 'warning' }}">
                                {{ ucfirst($place->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.places.edit', $place) }}" class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.places.destroy', $place) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this place?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No places found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $places->links() }}
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .table img {
            border-radius: 4px;
        }

        .badge {
            padding: 0.5em 0.75em;
        }
    </style>
@endpush
