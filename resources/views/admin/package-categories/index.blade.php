@extends('admin.layouts.app', ['title' => 'Package Categories'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.package-categories.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search categories..."
                    value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q'))
                        <a href="{{ route('admin.package-categories.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.package-categories.create') }}" class="btn btn-primary">Add New Category</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Tagline</th>
                    <th>Status</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>
                            <div>
                                <a href="{{ route('admin.package-categories.edit', $category) }}"
                                    class="font-weight-bold text-dark">{{ $category->name }}</a>
                                @if ($category->slug)
                                    <div class="small">
                                        <span class="text-muted">{{ $category->slug }}</span>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td>{{ $category->tagline }}</td>
                        <td>
                            <span
                                class="badge capitalize badge-{{ $category->status == 'active' ? 'success' : 'warning' }}">
                                {{ ucfirst($category->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.package-categories.edit', $category) }}"
                                class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.package-categories.destroy', $category) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $categories->links() }}
    </div>
@endsection

@push('styles')
    <style>
        .badge {
            padding: 0.5em 0.75em;
        }
    </style>
@endpush
