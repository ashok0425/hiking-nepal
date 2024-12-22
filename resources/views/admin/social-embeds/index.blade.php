@extends('admin.layouts.app', ['title' => 'Social Embeds'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.social-embeds.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search social embeds..."
                    value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q'))
                        <a href="{{ route('admin.social-embeds.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.social-embeds.create') }}" class="btn btn-primary">Add New Social Embed</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Source</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($socialEmbeds as $socialEmbed)
                    <tr>
                        <td>
                            <a href="{{ route('admin.social-embeds.edit', $socialEmbed) }}"
                                class="font-weight-bold text-dark">
                                {{ $socialEmbed->title }}
                            </a>
                        </td>
                        <td>
                            {{ $socialEmbed->source }}
                        </td>
                        <td>
                            <a href="{{ route('admin.social-embeds.edit', $socialEmbed) }}"
                                class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.social-embeds.destroy', $socialEmbed) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this social embed?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">No social embeds found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
