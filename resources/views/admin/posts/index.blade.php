@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Posts</h3>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create Post</a>
            </div>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-3">
                <form action="{{ route('admin.posts.index') }}" method="GET" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search posts..."
                            value="{{ request('q') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                            @if (request('q'))
                                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">Clear</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Published At</th>
                            <th width="200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if ($post->thumbnail)
                                            <img src="{{ Storage::url($post->thumbnail) }}" alt="Thumbnail" class="mr-2"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                        <span>{{ $post->title }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $post->status === 'published' ? 'success' : 'warning' }}">
                                        {{ ucfirst($post->status) }}
                                    </span>
                                </td>
                                <td>
                                    {{ $post->published_at ? $post->published_at->format('Y-m-d H:i') : 'Not published' }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-info">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No posts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $posts->links() }}
            </div>
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
