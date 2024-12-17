@extends('admin.layouts.app', ['title' => 'Destinations'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.destinations.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search destinations..."
                    value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q'))
                        <a href="{{ route('admin.destinations.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary">Add New Destination</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($destinations as $destination)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if ($destination->cover)
                                    <img src="{{ str_starts_with($destination->cover, 'http') ? $destination->cover : Storage::url($destination->cover) }}"
                                        alt="Cover" class="mr-2" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="mr-2 bg-secondary d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; border-radius: 4px;">
                                        <i class="fas fa-image text-white"></i>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ route('admin.destinations.edit', $destination) }}"
                                        class="font-weight-bold text-dark">{{ $destination->name }}</a>
                                    @if ($destination->slug)
                                        <div class="small">
                                            <a href="#" class="text-muted" target="_blank">
                                                {{ $destination->slug }}
                                            </a>
                                        </div>
                                    @endif
                                    @if ($destination->tagline)
                                        <div class="small text-muted">{{ $destination->tagline }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-{{ $destination->status === 'active' ? 'success' : 'warning' }}">
                                {{ ucfirst($destination->status) }}
                            </span>
                        </td>
                        <td>{{ $destination->order }}</td>
                        <td>
                            <a href="{{ route('admin.destinations.edit', $destination) }}"
                                class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.destinations.destroy', $destination) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this destination?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No destinations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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
