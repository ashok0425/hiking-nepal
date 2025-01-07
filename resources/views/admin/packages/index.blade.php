@extends('admin.layouts.app', ['title' => 'Packages'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.packages.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search packages..."
                    value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q'))
                        <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">Add New Package</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Destination</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($packages as $package)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if ($package->gallery && count($package->gallery) > 0)
                                    <img src="{{ $package->galleryImages()[0] }}" alt="Cover" class="mr-2"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="mr-2 bg-secondary d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; border-radius: 4px;">
                                        <i class="fas fa-image text-white"></i>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ route('admin.packages.edit', $package) }}"
                                        class="font-weight-bold text-dark">{{ $package->title }}</a>
                                    @if ($package->slug)
                                        <div class="small">
                                            <a href="{{ route('admin.packages.show', $package->slug) }}" class="text-muted"
                                                target="_blank">
                                                {{ $package->slug }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>{{ $package->destination->name ?? 'N/A' }}, {{ $package->place->name ?? 'N/A' }}</td>
                        <td>
                            <span class="badge badge-{{ $package->status === 'published' ? 'success' : 'warning' }}">
                                {{ ucfirst($package->status) }}
                            </span>
                        </td>
                        <td>${{ number_format($package->getPrice()) }}</td>
                        <td>{{ $package->tour_duration }}</td>
                        <td>
                            <div class="d-flex flex-wrap" style="gap: 8px;">
                                <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-sm btn-info me-1">
                                    Edit
                                </a>

                                <form action="{{ route('admin.packages.toggle-status', $package) }}" method="POST"
                                    class="d-inline me-1"
                                    onsubmit="return confirm('Are you sure you want to {{ $package->status === 'published' ? 'unpublish' : 'publish' }} this package?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="btn btn-sm {{ $package->status === 'published' ? 'btn-warning' : 'btn-success' }}">
                                        {{ $package->status === 'published' ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>

                                <form action="{{ route('admin.packages.destroy', $package) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this package?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No packages found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($packages->hasPages())
            <div class="p-3">
                {{ $packages->links() }}
            </div>
        @endif
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
