@extends('admin.layouts.app', ['title' => 'Edit Place'])

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

        <form action="{{ route('admin.places.update', $place) }}" method="POST" enctype="multipart/form-data" id="placeForm">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $place->name) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Destination</label>
                                <select name="destination_id" class="form-control" required>
                                    <option value="">Select Destination</option>
                                    @foreach (\App\Models\Destination::where('status', 'active')->get() as $destination)
                                        <option value="{{ $destination->id }}"
                                            {{ old('destination_id', $place->destination_id) == $destination->id ? 'selected' : '' }}>
                                            {{ $destination->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="10">{{ old('description', $place->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Place Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select name="status" class="form-control" required>
                                    <option value="inactive"
                                        {{ old('status', $place->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="active"
                                        {{ old('status', $place->status) == 'active' ? 'selected' : '' }}>Active</option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Place</button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Cover Image</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="file" name="cover" class="form-control-file" accept="image/*">
                                <small class="form-text text-muted">Leave empty to keep current image</small>
                                <div id="cover-preview" class="mt-2">
                                    @if ($place->cover)
                                        <img src="{{ $place->cover }}" alt="Current cover" style="max-width: 100%;">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">SEO Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control"
                                    value="{{ old('meta_title', $place->meta_title) }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control"
                                    value="{{ old('meta_keywords', $place->meta_keywords) }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $place->meta_description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelector('input[name="cover"]').addEventListener('change', function(e) {
            const preview = document.getElementById('cover-preview');
            preview.innerHTML = '';
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100%';
                    preview.appendChild(img);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endpush
