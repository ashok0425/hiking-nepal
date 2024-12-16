@extends('admin.layouts.app', ['title' => 'Edit Post'])

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

        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" id="postForm">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Left Column - Main Content -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $post->title) }}" required>
                                @if ($post->slug)
                                    <div class="small mt-1 text-muted">
                                        URL: <a href="{{ route('blog-page', $post->slug) }}" class="text-muted"
                                            target="_blank">
                                            {{ $post->slug }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" id="editor" class="form-control">{{ old('content', $post->content) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Meta, Status, Images -->
                <div class="col-md-4">
                    <!-- Status Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Post Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select name="status" class="form-control" required>
                                    <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>
                                        Draft</option>
                                    <option value="published"
                                        {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published
                                    </option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Post</button>
                            </div>
                        </div>
                    </div>

                    <!-- Images Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Images</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Thumbnail Image</label>
                                <input type="file" name="thumbnail" class="form-control-file" accept="image/*">
                                <div id="thumbnail-preview" class="mt-2">
                                    @if ($post->thumbnail)
                                        <img src="{{ Str::startsWith($post->thumbnail, 'http') ? $post->thumbnail : Storage::url($post->thumbnail) }}"
                                            alt="Thumbnail" style="max-width: 100%">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <label>Cover Image</label>
                                <input type="file" name="cover" class="form-control-file" accept="image/*">
                                <div id="cover-preview" class="mt-2">
                                    @if ($post->cover)
                                        <img src="{{ Storage::url($post->cover) }}" alt="Cover" style="max-width: 100%">
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
                                    value="{{ old('meta_title', $post->meta_title) }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control"
                                    value="{{ old('meta_keywords', $post->meta_keywords) }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $post->meta_description) }}</textarea>
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
        ClassicEditor
            .create(document.querySelector('#editor'), {
                simpleUpload: {
                    uploadUrl: "{{ route('admin.ck-upload', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

        document.querySelector('input[name="thumbnail"]').addEventListener('change', function(e) {
            const preview = document.getElementById('thumbnail-preview');
            preview.innerHTML = '';
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '200px';
                    preview.appendChild(img);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

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

@push('style')
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>
@endpush
