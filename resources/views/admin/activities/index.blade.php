@extends('admin.layouts.app', ['title' => 'Activities'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.activities.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search activities..."
                    value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q'))
                        <a href="{{ route('admin.activities.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.activities.create') }}" class="btn btn-primary">Add New Activity</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($activities as $activity)
                    <tr>
                        <td>
                            <a href="{{ route('admin.activities.edit', $activity) }}" class="font-weight-bold text-dark">
                                {{ $activity->name }}
                            </a>
                            @if ($activity->slug)
                                <div class="small text-muted">
                                    {{ $activity->slug }}
                                </div>
                            @endif
                        </td>
                        <td>{{ Str::limit($activity->description, 100) }}</td>
                        <td>
                            <a href="{{ route('admin.activities.edit', $activity) }}" class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this activity?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No activities found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
