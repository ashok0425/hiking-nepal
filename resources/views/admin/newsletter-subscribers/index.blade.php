@extends('admin.layouts.app', ['title' => 'Newsletter Subscribers'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.newsletter-subscribers.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search subscribers..."
                    value="{{ request('q') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q'))
                        <a href="{{ route('admin.newsletter-subscribers.index') }}"
                            class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.newsletter-subscribers.create') }}" class="btn btn-primary">Add New Subscriber</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subscribers as $subscriber)
                    <tr>
                        <td>{{ $subscriber->email }}</td>
                        <td>
                            {{ $subscriber->first_name }} {{ $subscriber->last_name }}
                        </td>
                        <td>
                            <span class="badge badge-{{ $subscriber->status === 'subscribed' ? 'success' : 'warning' }}">
                                {{ ucfirst($subscriber->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.newsletter-subscribers.edit', $subscriber) }}"
                                class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.newsletter-subscribers.destroy', $subscriber) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this subscriber?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No subscribers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $subscribers->links() }}
        </div>
    </div>
@endsection
