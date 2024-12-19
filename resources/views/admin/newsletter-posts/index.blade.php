@extends('admin.layouts.app', ['title' => 'Newsletter Posts'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.newsletter-posts.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search newsletter posts..."
                    value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q'))
                        <a href="{{ route('admin.newsletter-posts.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.newsletter-posts.create') }}" class="btn btn-primary">Add New Newsletter Post</a>
    </div>

    <div class="mb-1">
        {{ $newsletterPosts->links() }}
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Published At</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($newsletterPosts as $post)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if ($post->image_url)
                                    <img src="{{ $post->image_url }}" alt="Image" class="mr-2"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="mr-2 bg-secondary d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px; border-radius: 4px;">
                                        <i class="fas fa-image text-white"></i>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ route('admin.newsletter-posts.edit', $post) }}"
                                        class="font-weight-bold text-dark">{{ $post->title }}</a>
                                </div>
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
                            <a href="{{ route('admin.newsletter-posts.edit', $post) }}" class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.newsletter-posts.destroy', $post) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this newsletter post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No newsletter posts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $newsletterPosts->links() }}
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
