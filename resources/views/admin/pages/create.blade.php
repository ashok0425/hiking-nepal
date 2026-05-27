@extends('admin.layouts.app', ['title' => 'Add New Page'])

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

        <form action="{{ route('admin.pages.store') }}" method="POST" id="pageForm">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group">
                                <label>Slug <small class="text-muted">(leave blank to auto-generate from title)</small></label>
                                <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
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
                            <h5 class="mb-0">Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select name="status" class="form-control" required>
                                    <option value="published" {{ old('status', 'published') == 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Create Page</button>
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
                                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description') }}</textarea>
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
    </script>
@endpush

@push('style')
    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
    </style>
@endpush
