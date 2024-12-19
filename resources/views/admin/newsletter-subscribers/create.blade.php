@extends('admin.layouts.app', ['title' => 'Add New Newsletter Subscriber'])

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

        <form action="{{ route('admin.newsletter-subscribers.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required>
                            </div>

                            <div class="form-group mt-3">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ old('first_name') }}">
                            </div>

                            <div class="form-group mt-3">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Subscriber Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select name="status" class="form-control" required>
                                    <option value="subscribed" {{ old('status') == 'subscribed' ? 'selected' : '' }}>
                                        Subscribed</option>
                                    <option value="unsubscribed" {{ old('status') == 'unsubscribed' ? 'selected' : '' }}>
                                        Unsubscribed</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="unconfirmed" {{ old('status') == 'unconfirmed' ? 'selected' : '' }}>
                                        Unconfirmed</option>
                                    <option value="bounced" {{ old('status') == 'bounced' ? 'selected' : '' }}>Bounced
                                    </option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Create Subscriber</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
