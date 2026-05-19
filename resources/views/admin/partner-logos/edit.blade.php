@extends('admin.layouts.app', ['title' => 'Edit Partner Logo'])

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

        <form action="{{ route('admin.partner-logos.update', $partnerLogo) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $partnerLogo->name) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Logo Image</label>
                                <input type="file" name="logo" class="form-control" accept="image/*">
                                @if ($partnerLogo->logo_url)
                                    <div class="mt-2">
                                        <img src="{{ $partnerLogo->logo_url }}" alt="{{ $partnerLogo->name }}"
                                            style="max-width: 120px; max-height: 80px; object-fit: contain;">
                                        <p class="text-muted small mt-1">Current logo. Upload new to replace.</p>
                                    </div>
                                @endif
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
                                    value="{{ old('sort_order', $partnerLogo->sort_order) }}">
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" value="1" class="form-check-input"
                                        id="is_active"
                                        {{ old('is_active', $partnerLogo->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Partner Logo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
