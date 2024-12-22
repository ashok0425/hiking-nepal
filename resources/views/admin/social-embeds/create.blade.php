@extends('admin.layouts.app', ['title' => 'Add New Social Embed'])

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

        <form action="{{ route('admin.social-embeds.store') }}" method="POST">
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
                                <label>Source</label>
                                <input type="text" name="source" class="form-control"
                                    value="{{ old('source', 'Instagram') }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label>Embed Body</label>
                                <textarea id="embedBody" name="body" class="form-control" rows="10" required>{{ old('body') }}</textarea>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Create Social Embed</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="embedPreview" class="preview-container">
                        <!-- Preview will be rendered here -->
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const embedBodyTextarea = document.getElementById('embedBody');
            const embedPreview = document.getElementById('embedPreview');

            // Initial preview
            updatePreview();

            // Add event listener for real-time preview
            embedBodyTextarea.addEventListener('input', updatePreview);
            embedBodyTextarea.addEventListener('change', updatePreview);
            embedBodyTextarea.addEventListener('keyup', updatePreview);
            embedBodyTextarea.addEventListener('paste', updatePreview);

            function updatePreview() {
                const embedCode = embedBodyTextarea.value.trim();

                if (embedCode) {
                    // Render the embed code directly
                    embedPreview.innerHTML = embedCode;

                    // Reload Instagram embed script to render the embed
                    if (window.instgrm) {
                        window.instgrm.Embeds.process();
                    } else {
                        // If script is not loaded, dynamically load it
                        const script = document.createElement('script');
                        script.src = '//www.instagram.com/embed.js';
                        script.async = true;
                        script.onload = function() {
                            if (window.instgrm) {
                                window.instgrm.Embeds.process();
                            }
                        };
                        document.body.appendChild(script);
                    }
                } else {
                    embedPreview.innerHTML = 'No preview available';
                }
            }
        });
    </script>
@endpush
