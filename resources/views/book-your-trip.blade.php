@extends('layouts.website')

@section('title', 'Hiking Nepal')

@section('content')
    <div>
        <div class="container py-5 my-5" style="max-width: 960px;">
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

               @error('g-recaptcha-response')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

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
                    <form method="POST" id="queryForm">
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
                            <label for="nationality" class="form-label fw-bold">Package <span
                                    class="text-danger">*</span></label>
                           <select name="package" id="" class="form-select form-control" required>
                             <option value="">select package</option>
                            @foreach (App\Models\Package::where('status','published')->whereNotNull('sale_price_per_person')->get() as $package)
                                <option value="{{$package->id}}" {{$package->id==request()->query('package')?'selected':''}}>{{$package->title}}</option>
                            @endforeach
                           </select>
                        </div>

                        @if (request()->query('type')=='payment')

                         <div class="mb-5">
                            <label for="amount" class="form-label fw-bold">Amount (USD) <span
                                    class="text-danger">*</span></label>
                            <input type="number" min="1" step="0.01" class="form-control @error('amount') is-invalid @enderror"
                                id="amount" name="amount" value="{{ old('amount') }}"
                                placeholder="Amount want to pay (USD)" required>

                            <div id="payment-breakdown" class="mt-3 p-3 border rounded bg-light" style="display: none;">
                                <div class="d-flex justify-content-between small">
                                    <span>Subtotal:</span>
                                    <span>$<span id="pb-subtotal">0.00</span></span>
                                </div>
                                <div class="d-flex justify-content-between small">
                                    <span>Processing charge (4%):</span>
                                    <span>$<span id="pb-fee">0.00</span></span>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total to pay:</span>
                                    <span>$<span id="pb-total">0.00</span></span>
                                </div>
                                <small class="text-muted d-block mt-2">A 4% processing charge is added to cover payment gateway fees.</small>
                            </div>
                        </div>
                        <input type="hidden" name="type" value="2">
                        @endif


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

                            <button type="submit" class="btn btn-primary g-recaptcha"
                            data-sitekey="6LdphbAqAAAAAFaAnoPYmK6A8a9GU3e8gMJc_N_A"  data-action='submit' data-callback='onSubmit'>
 @if (request()->query('type')=='payment')
                                Proceed To Payment
                                @else
                                Submit
                                @endif
                                <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
@push('scripts')

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
          function onSubmit(token) {
            const form = document.getElementById("queryForm");
            if (form.checkValidity()) {
                form.submit();
            } else {
                form.reportValidity();
            }
        }

        (function () {
            const amountInput = document.getElementById('amount');
            if (!amountInput) return;
            const breakdown = document.getElementById('payment-breakdown');
            const subEl = document.getElementById('pb-subtotal');
            const feeEl = document.getElementById('pb-fee');
            const totalEl = document.getElementById('pb-total');
            const FEE_RATE = 0.04;

            function format(n) {
                return (Math.round(n * 100) / 100).toFixed(2);
            }

            function update() {
                const sub = parseFloat(amountInput.value);
                if (!sub || sub <= 0) {
                    breakdown.style.display = 'none';
                    return;
                }
                const fee = sub * FEE_RATE;
                const total = sub + fee;
                subEl.textContent = format(sub);
                feeEl.textContent = format(fee);
                totalEl.textContent = format(total);
                breakdown.style.display = 'block';
            }

            amountInput.addEventListener('input', update);
            update();
        })();

    </script>
    @endpush