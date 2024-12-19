@extends('admin.layouts.app', ['title' => 'Edit Review'])

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

        <form action="{{ route('admin.reviews.update', $review) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="user_name" class="form-control"
                                    value="{{ old('user_name', $review->user_name) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Package</label>
                                <select name="package_id" class="form-control" required>
                                    <option value="">Select Package</option>
                                    @foreach ($packages as $package)
                                        <option value="{{ $package->id }}"
                                            {{ old('package_id', $review->package_id) == $package->id ? 'selected' : '' }}>
                                            {{ $package->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label>Rating</label>
                                <select name="rating" class="form-control" required>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}"
                                            {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                                            {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label>Comment</label>
                                <textarea name="comment" class="form-control" rows="5" required>{{ old('comment', $review->comment) }}</textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label>Current User Photo</label>
                                @if ($review->user_photo)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $review->user_photo) }}" alt="User Photo"
                                            style="max-width: 200px; max-height: 200px;">
                                    </div>
                                @endif
                                <input type="file" name="user_photo" class="form-control" accept="image/*">
                                <small class="text-muted">Leave blank to keep current photo</small>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="pending"
                                        {{ old('status', $review->status) == 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                    <option value="approved"
                                        {{ old('status', $review->status) == 'approved' ? 'selected' : '' }}>
                                        Approved
                                    </option>
                                    <option value="rejected"
                                        {{ old('status', $review->status) == 'rejected' ? 'selected' : '' }}>
                                        Rejected
                                    </option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Review</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
