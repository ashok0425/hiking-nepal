@extends('admin.layouts.app', ['title' => 'Scheduled Callbacks'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.scheduled-callbacks.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search callbacks..."
                    value="{{ request('q') }}">
                <select name="status" class="custom-select control ml-2">
                    <option value="">All Statuses</option>
                    @foreach (App\Models\ScheduledCallback::getStatuses() as $value => $label)
                        <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q') || request('status'))
                        <a href="{{ route('admin.scheduled-callbacks.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.scheduled-callbacks.create') }}" class="btn btn-primary">Add New Callback</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Callback Date</th>
                    <th>Status</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($scheduledCallbacks as $callback)
                    <tr>
                        <td>{{ $callback->first_name }} {{ $callback->last_name }}</td>
                        <td>
                            <div>{{ $callback->email }}</div>
                            <div>{{ $callback->phone }}</div>
                        </td>
                        <td>{{ $callback->callback_date }} {{ $callback->callback_time }}</td>
                        <td>
                            <span
                                class="badge badge-{{ $callback->status == 'pending' ? 'warning' : ($callback->status == 'completed' ? 'success' : 'danger') }}">
                                {{ ucfirst($callback->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.scheduled-callbacks.edit', $callback) }}"
                                class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.scheduled-callbacks.destroy', $callback) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this callback?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No scheduled callbacks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $scheduledCallbacks->appends(request()->query())->links() }}
    </div>
@endsection
