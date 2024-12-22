@extends('admin.layouts.app', ['title' => 'Edit Home FAQs'])

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

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.home-faqs.update', 'home_faqs') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Main Content Column -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Home FAQs Content</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>FAQs Content</label>
                                <textarea name="value" class="form-control" rows="15" required
                                    placeholder="## What is the best time to visit?
The best season is from March to May when the weather is pleasant.

## Do I need travel insurance?
Yes, we highly recommend getting travel insurance to cover any emergencies.

## What should I pack?
Comfortable walking shoes, warm clothes, and basic medications.">{{ old('value', $pageSection->value ?? '') }}</textarea>
                                <small class="text-muted">Use ## followed by question text, then add the answer in new line
                                    below</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Column -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Update Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Section Key</label>
                                <input type="text" class="form-control" value="home_faqs" disabled>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary w-100">Update Home FAQs</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
