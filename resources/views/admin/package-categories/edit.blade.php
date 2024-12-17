@extends('admin.layouts.app', ['title' => 'Edit Package Category'])

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

        <form action="{{ route('admin.package-categories.update', $packageCategory) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $packageCategory->name) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Tagline</label>
                                <input type="text" name="tagline" class="form-control"
                                    value="{{ old('tagline', $packageCategory->tagline) }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('desc', $packageCategory->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Category Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select name="status" class="form-control" required>
                                    <option value="inactive"
                                        {{ old('status', $packageCategory->status) == 'inactive' ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                    <option value="active"
                                        {{ old('status', $packageCategory->status) == 'active' ? 'selected' : '' }}>
                                        Active
                                    </option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
