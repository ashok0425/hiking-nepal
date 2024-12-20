@extends('admin.layouts.app', ['title' => 'Edit Scheduled Callback'])

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

        <form action="{{ route('admin.scheduled-callbacks.update', $scheduledCallback) }}" method="POST">
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
                                            value="{{ old('first_name', $scheduledCallback->first_name) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name', $scheduledCallback->last_name) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $scheduledCallback->email) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Comments</label>
                                <textarea name="comments" class="form-control" rows="4" required>{{ old('comments', $scheduledCallback->comments) }}</textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label>Callback Message (Optional)</label>
                                <textarea name="callback_message" class="form-control" rows="4">{{ old('callback_message', $scheduledCallback->callback_message) }}</textarea>
                                <small class="form-text text-muted">
                                    Notes or details from the actual callback conversation
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Callback Date</label>
                                <input type="date" name="callback_date" class="form-control"
                                    value="{{ old('callback_date', $scheduledCallback->callback_date) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Callback Time</label>
                                <input type="time" name="callback_time" class="form-control"
                                    value="{{ old('callback_time', $scheduledCallback->callback_time) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    @foreach (App\Models\ScheduledCallback::getStatuses() as $value => $label)
                                        <option value="{{ $value }}"
                                            {{ old('status', $scheduledCallback->status) == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-3 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Update Callback</button>
                                <a href="{{ route('admin.scheduled-callbacks.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
