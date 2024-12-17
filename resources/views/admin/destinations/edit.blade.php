@extends('admin.layouts.app', ['title' => 'Edit Destination'])

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

        <form action="{{ route('admin.destinations.update', $destination) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Left Column - Main Content -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $destination->name) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Tagline</label>
                                <input type="text" name="tagline" class="form-control"
                                    value="{{ old('tagline', $destination->tagline) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Description</label>
                                <textarea name="desc" class="form-control" rows="10">{{ old('desc', $destination->desc) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Status, Images, SEO -->
                <div class="col-md-4">
                    <!-- Status Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select name="status" class="form-control" required>
                                    <option value="active"
                                        {{ old('status', $destination->status) == 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="inactive"
                                        {{ old('status', $destination->status) == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label>Order</label>
                                <input type="number" name="order" class="form-control"
                                    value="{{ old('order', $destination->order) }}" required>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Destination</button>
                            </div>
                        </div>
                    </div>

                    <!-- Cover Image Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Cover Image</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="file" name="cover" class="form-control-file" accept="image/*">
                                <div id="cover-preview" class="mt-2">
                                    @if ($destination->cover)
                                        <img src="{{ Storage::url($destination->cover) }}" alt="Cover"
                                            style="max-width: 100%">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Card -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">SEO Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control"
                                    value="{{ old('meta_title', $destination->meta_title) }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Keywords</label>
                                <input type="text" name="meta_keyword" class="form-control"
                                    value="{{ old('meta_keyword', $destination->meta_keyword) }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $destination->meta_description) }}</textarea>
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
