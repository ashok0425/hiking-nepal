@extends('admin.layouts.app', ['title' => 'Edit Team Member'])

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

        <form action="{{ route('admin.team-members.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $teamMember->name) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Position</label>
                                <input type="text" name="position" class="form-control"
                                    value="{{ old('position', $teamMember->position) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Description</label>
                                <textarea name="comment" class="form-control" rows="5" required>{{ old('comment', $teamMember->comment) }}</textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label>Current Photo</label>
                                @if ($teamMember->photo_url)
                                    <div class="mb-2">
                                        <img src="{{ $teamMember->photo_url }}" alt="{{ $teamMember->name }}"
                                            style="max-width: 200px; max-height: 200px;">
                                    </div>
                                @endif
                                <input type="file" name="photo" class="form-control" accept="image/*">
                                <small class="text-muted">Leave blank to keep current photo</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Sort Order</label>
                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order', $teamMember->sort_order) }}">
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Team Member</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
