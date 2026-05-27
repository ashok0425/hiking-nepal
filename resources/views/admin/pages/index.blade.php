@extends('admin.layouts.app', ['title' => 'Pages'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.pages.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search pages..."
                    value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q'))
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Add New Page</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug / URL</th>
                    <th>Status</th>
                    <th>Updated</th>
                    <th width="240">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pages as $page)
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td>
                            <a href="{{ route('dynamic-page', $page->slug) }}" target="_blank">
                                /{{ $page->slug }}
                            </a>
                        </td>
                        <td>
                            <span class="badge badge-{{ $page->status === 'published' ? 'success' : 'secondary' }}">
                                {{ ucfirst($page->status) }}
                            </span>
                        </td>
                        <td>{{ $page->updated_at?->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-info me-1">Edit</a>
                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this page?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No pages found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $pages->links() }}
    </div>
@endsection
