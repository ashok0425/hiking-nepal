@extends('admin.layouts.app', ['title' => 'Add New Newsletter Post'])

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

        <form action="{{ route('admin.newsletter-posts.store') }}" method="POST" enctype="multipart/form-data"
            id="newsletterPostForm">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" id="editor" class="form-control">{{ old('content') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Post Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select name="status" class="form-control" disabled>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published
                                    </option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Create Newsletter Post</button>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Image</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Newsletter Post Image</label>
                                <input type="file" name="image_url" class="form-control-file" accept="image/*">
                                <div id="image-preview" class="mt-2"></div>
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

        document.querySelector('input[name="image_url"]').addEventListener('change', function(e) {
            const preview = document.getElementById('image-preview');
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
