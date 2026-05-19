@extends('admin.layouts.app', ['title' => 'Add New Team Member'])

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

        <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Position</label>
                                <input type="text" name="position" class="form-control" value="{{ old('position') }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Description</label>
                                <textarea name="comment" class="form-control" rows="5" required>{{ old('comment') }}</textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Create Team Member</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
