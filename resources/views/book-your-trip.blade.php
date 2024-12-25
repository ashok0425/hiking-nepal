@extends('layouts.website')

@section('title', 'Hiking Nepal')

@section('content')
    <div class="py-5">
        <div class="container py-lg-5 my-5" style="max-width: 960px;">
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card border">
                <div class="card-body p-4">
                    <form method="POST">
                        @csrf

                        <div class="mb-5">
                            <div class="fw-bold mb-2 fs-5">Your information</div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label fw-bold">First Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('firstName') is-invalid @enderror"
                                    id="firstName" name="firstName" value="{{ old('firstName') }}"
                                    placeholder="Enter your first name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label fw-bold">Last Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                                    placeholder="Enter your last name" id="lastName" value="{{ old('lastName') }}"
                                    name="lastName" required>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="contactNumber" class="form-label fw-bold">Contact Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('contactNumber') is-invalid @enderror"
                                id="contactNumber" name="contactNumber" value="{{ old('contactNumber') }}"
                                placeholder="Enter your contact number" required>
                        </div>

                        <div class="mb-5">
                            <label for="email" class="form-label fw-bold">Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" placeholder="Enter your email address"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                value="{{ old('email') }}" name="email" required>
                        </div>

                        <div class="mb-5">
                            <label for="nationality" class="form-label fw-bold">Nationality <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nationality') is-invalid @enderror"
                                id="nationality" name="nationality" value="{{ old('nationality') }}"
                                placeholder="Enter your nationality" required>
                        </div>

                        <div class="mb-5">
                            <label for="message" class="form-label fw-bold">Message <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error('message') is-invalid @enderror" placeholder="Write your message here"
                                id="message" name="message" rows="10" required>{{ old('message') }}</textarea>
                        </div>

                        <div class="fw-bold mb-2">Data Privacy</div>

                        <div class="p-3 mb-5" style="background-color: rgba(242, 242, 242, 1)">
                            <p class="small">At Hiking Nepal, we respect your privacy and are committed to protecting
                                your
                                personal information. We collect and use data only to provide and improve our services.
                                By
                                using this website, you agree to the collection and use of information in accordance
                                with our
                                Privacy Policy.</p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror"
                                    id="terms" name="terms" {{ old('terms') ? 'checked' : '' }} required>
                                <label class="form-check-label small" for="terms">By clicking "I Agree" or using
                                    this
                                    site, you confirm that you have read and accept our Privacy Policy.</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                Proceed To Payment<i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
