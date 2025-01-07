@extends('admin.layouts.app', ['title' => 'Edit Booking'])

@section('content')
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ old('first_name', $booking->first_name) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name', $booking->last_name) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $booking->email) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Contact Number</label>
                                <input type="text" name="contact_number" class="form-control"
                                    value="{{ old('contact_number', $booking->contact_number) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Booking Date</label>
                                <input type="date" name="date" class="form-control"
                                    value="{{ old('date', $booking->date) }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Nationality</label>
                                <input type="text" name="nationality" class="form-control"
                                    value="{{ old('nationality', $booking->nationality) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Message</label>
                                <textarea name="message" class="form-control" rows="4" required>{{ old('message', $booking->message) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    @foreach (App\Models\Booking::getStatuses() as $status)
                                        <option value="{{ $status }}"
                                            {{ old('status', $booking->status) == $status ? 'selected' : '' }}>
                                            {{ ucfirst($status) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Booking</button>
                                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
