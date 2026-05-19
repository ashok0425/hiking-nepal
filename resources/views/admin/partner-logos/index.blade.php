@extends('admin.layouts.app', ['title' => 'Partner Logos'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.partner-logos.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search partner logos..."
                    value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q'))
                        <a href="{{ route('admin.partner-logos.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.partner-logos.create') }}" class="btn btn-primary">Add New Logo</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Sort Order</th>
                    <th>Status</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($partnerLogos as $logo)
                    <tr>
                        <td>
                            @if ($logo->logo_url)
                                <img src="{{ $logo->logo_url }}" alt="{{ $logo->name }}"
                                    style="max-width: 80px; max-height: 60px; object-fit: contain;">
                            @else
                                <span class="text-muted">No logo</span>
                            @endif
                        </td>
                        <td>{{ $logo->name }}</td>
                        <td>{{ $logo->sort_order }}</td>
                        <td>
                            <span class="badge {{ $logo->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $logo->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.partner-logos.edit', $logo) }}" class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.partner-logos.destroy', $logo) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this logo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No partner logos found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
