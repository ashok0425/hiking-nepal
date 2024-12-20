@extends('admin.layouts.app', ['title' => 'Bookings'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px;">
        <form action="{{ route('admin.bookings.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search bookings..."
                    value="{{ request('q') }}">
                <select name="status" class="custom-select control ml-2">
                    <option value="">All Statuses</option>
                    @foreach (App\Models\Booking::getStatuses() as $status)
                        <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    @if (request('q') || request('status'))
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>
        <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">Add New Booking</a>
    </div>

    <div class="table-responsive bg-white">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Nationality</th>
                    <th>Status</th>
                    <th width="200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->first_name }} {{ $booking->last_name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->contact_number }}</td>
                        <td>{{ $booking->nationality }}</td>
                        <td>
                            <span
                                class="badge badge-{{ $booking->status == 'pending' ? 'warning' : ($booking->status == 'confirmed' ? 'success' : 'danger') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-sm btn-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No bookings found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $bookings->appends(request()->query())->links() }}
    </div>
@endsection
