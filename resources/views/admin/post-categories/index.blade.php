@extends('admin.layouts.app', ['title' => 'Post Categories'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.post-categories.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search Post Categories..."
                    value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q'))
                        <a href="{{ route('admin.post-categories.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.post-categories.create') }}" class="btn btn-primary">Add New Post Category</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($postActivities as $postCategory)
                    <tr>
                        <td>{{ $postCategory->name }}</td>
                        <td>{{ $postCategory->slug }}</td>
                        <td>
                            <a href="{{ route('admin.post-categories.edit', $postCategory) }}"
                                class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.post-categories.destroy', $postCategory) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this Post Category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No Post Categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
