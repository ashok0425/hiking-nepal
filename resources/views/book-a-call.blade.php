@extends('layouts.website')

@section('title', 'Book a Call')

@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="Schedule a call with Hiking Nepal's team to discuss your trekking plans, get expert advice, and plan your perfect Himalayan adventure. Book a personalized consultation today.">
    <meta name="keywords"
        content="book call hiking nepal, trek consultation nepal, himalayan trek planning, trekking consultation, nepal hiking consultation">
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="Book a Call - Hiking Nepal">
    <meta property="og:description"
        content="Schedule a call with Hiking Nepal's team to discuss your trekking plans, get expert advice, and plan your perfect Himalayan adventure. Book a personalized consultation today.">
    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Book a Call - Hiking Nepal">
    <meta name="twitter:description"
        content="Schedule a call with Hiking Nepal's team to discuss your trekking plans, get expert advice, and plan your perfect Himalayan adventure. Book a personalized consultation today.">
@endsection

@section('content')
    <div style="max-width: 900px;" class="mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="bookingSteps">
            <div class="step" id="step1">
                <div class="container">
                    <div class="row my-5 brand-shadow-lg">
                        <div class="col-md-6 bg-primary p-3 p-md-5">
                            <div class="text-center mb-4">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('logo-white.png') }}" height="50" width="auto"
                                        alt="hiking nepal logo">
                                </a>
                            </div>

                            <h1 class="text-white text-center fs-5 fw-semibold mb-4">Chat with Hiking Nepal</h1>
                            <div class="calendar-container mb-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="datepicker" placeholder="Select date"
                                        readonly>
                                    <span class="input-group-text">
                                        <i class="bi bi-calendar"></i>
                                    </span>
                                </div>
                                <div id="inline-calendar" class="d-flex justify-content-center"></div>
                            </div>
                        </div>

                        <div class="col-md-6 p-3 p-md-5">
                            <div class="form-light">
                                <input type="hidden" name="user_timezone" id="userTimezone">
                                <div class="mb-4">
                                    <div class="fw-bold mb-2">Meeting duration</div>
                                    <div class="bg-light py-2 text-center border">25 mins</div>
                                    <input type="hidden" name="duration" value="25">
                                </div>
                                <div class="mb-4">
                                    <div class="fw-bold mb-2">What time works best?</div>
                                    <div>Showing times for <span id="selectedDate" class="fw-bold">Please select a
                                            date</span>
                                    </div>
                                    <input type="hidden" name="selected_date" id="hiddenSelectedDate">
                                </div>

                                <div class="mb-4">
                                    <select class="form-select" id="timeSlot" name="time_slot" required>
                                        <option value="" selected disabled>Choose a time slot</option>
                                        <option value="9:00 AM">9:00 AM</option>
                                        <option value="10:00 AM">10:00 AM</option>
                                        <option value="11:00 AM">11:00 AM</option>
                                        <option value="2:00 PM">2:00 PM</option>
                                        <option value="3:00 PM">3:00 PM</option>
                                        <option value="4:00 PM">4:00 PM</option>
                                        <option value="5:00 PM">5:00 PM</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="notes" class="form-label fw-bold">Optional</label>
                                    <textarea class="form-control" id="notes" name="callback_message" rows="3"
                                        placeholder="Enter the time that best suits for you..."></textarea>
                                </div>

                                <button type="button" class="btn btn-primary w-100"
                                    onclick="validateAndProceed(1)">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="step" id="step2" style="display: none;">
                <div class="container my-5 py-5">
                    <div class="text-center mb-5">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('logo.png') }}" alt="hiking nepal logo" width="208" height="auto">
                        </a>
                    </div>

                    <div class="brand-shadow-lg p-3 p-md-5">
                        <form id="bookingForm" class="form-light" action="{{ route('book-a-call') }}" method="POST"
                            onsubmit="return validateAndSubmit(event)">
                            @csrf
                            <input type="hidden" name="datepicker" id="hiddenDate">
                            <input type="hidden" name="time_slot" id="hiddenTimeSlot">
                            <input type="hidden" name="duration" value="25">
                            <input type="hidden" name="callback_message" id="hiddenCallbackMessage">
                            <input type="hidden" name="user_timezone" id="userTimezone">

                            <div class="mb-5">
                                <div class="fw-bold mb-2 fs-5">Your information</div>
                                <div class="fw-bold text-primary">Saturday, December 11, 2024 8:15 pm <a href="#"
                                        class="text-danger">Edit</a></div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label fw-bold">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName" name="firstName"
                                        placeholder="Enter your first name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label fw-bold">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter your last name"
                                        id="lastName" name="lastName" required>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="email" class="form-label fw-bold">Email <span
                                        class="text-danger">*</span></label>
                                <input type="email" placeholder="Enter your email address" class="form-control"
                                    id="email" name="email" required>
                            </div>

                            <div class="mb-5">
                                <label for="phone" class="form-label fw-bold">Phone <span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter your phone number" class="form-control"
                                    id="phone" name="phone" required>
                            </div>

                            <div class="mb-5">
                                <label for="comments" class="form-label fw-bold">Comments <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" placeholder="Write your comment" id="comments" name="comments" rows="10"></textarea>
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
                                    <input type="checkbox" class="form-check-input" id="terms" required>
                                    <label class="form-check-label small" for="terms">By clicking "I Agree" or using
                                        this
                                        site, you confirm that you have read and accept our Privacy Policy.</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="goToStep(1)">
                                    <i class="fas fa-arrow-left me-2"></i>Back
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Submit<i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center mb-5">
                        <img src="{{ asset('images/check.png') }}" alt="check" width="150" height="auto">
                        <div class="fs-4 fw-bold text-success">Booking confirmed</div>
                        <div>An Invitation has been emailed to you</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookingForm = document.getElementById('bookingSteps');

            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('status') === 'submitted') {
                const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
                modal.show();
            }

            const userTimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            console.log('Detected user timezone:', userTimezone);

            // Scope timezone inputs to booking form
            const timezoneInputs = bookingForm.querySelectorAll('#userTimezone');
            timezoneInputs.forEach(input => {
                input.value = userTimezone;
                console.log('Set timezone input value:', input.value);
            });

            const picker = flatpickr("#datepicker", {
                inline: true,
                appendTo: document.getElementById("inline-calendar"),
                minDate: "today",
                dateFormat: "Y-m-d",
                disable: [
                    function(date) {
                        return (date.getDay() === 0 || date.getDay() === 6);
                    }
                ],
                onChange: function(selectedDates, dateStr, instance) {
                    const formattedDate = new Date(dateStr).toLocaleDateString('en-US', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric',
                        timeZone: userTimezone
                    });
                    bookingForm.querySelector('#selectedDate').textContent = formattedDate;
                }
            });
        });

        function goToStep(step) {
            const bookingForm = document.getElementById('bookingSteps');
            bookingForm.querySelectorAll('.step').forEach(el => el.style.display = 'none');
            bookingForm.querySelector(`#step${step}`).style.display = 'block';
        }

        function validateAndProceed(currentStep) {
            if (currentStep === 1) {
                const bookingForm = document.getElementById('bookingSteps');
                const dateInput = bookingForm.querySelector('#datepicker');
                const timeSlot = bookingForm.querySelector('#timeSlot');
                const notes = bookingForm.querySelector('#notes');

                if (!dateInput.value) {
                    alert('Please select a date');
                    return false;
                }

                if (!timeSlot.value) {
                    alert('Please select a time slot');
                    return false;
                }

                bookingForm.querySelector('#hiddenDate').value = dateInput.value;
                bookingForm.querySelector('#hiddenTimeSlot').value = timeSlot.value;
                bookingForm.querySelector('#hiddenCallbackMessage').value = notes.value;

                goToStep(2);
            }
        }

        function validateAndSubmit(event) {
            event.preventDefault();
            const form = event.target;

            // Log timezone value before form submission
            const timezoneInput = form.querySelector('#userTimezone');
            const firstName = form.querySelector('#firstName');
            const lastName = form.querySelector('#lastName');
            const email = form.querySelector('#email');
            const comments = form.querySelector('#comments');
            const terms = form.querySelector('#terms');

            if (!firstName.value.trim()) {
                alert('Please enter your first name');
                firstName.focus();
                return false;
            }

            if (!lastName.value.trim()) {
                alert('Please enter your last name');
                lastName.focus();
                return false;
            }

            if (!email.value.trim()) {
                alert('Please enter your email');
                email.focus();
                return false;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value.trim())) {
                alert('Please enter a valid email address');
                email.focus();
                return false;
            }

            if (!comments.value.trim()) {
                alert('Please enter your comments');
                comments.focus();
                return false;
            }

            if (!terms.checked) {
                alert('Please accept the terms and privacy policy');
                terms.focus();
                return false;
            }

            // Double-check timezone is set before submission
            if (!timezoneInput.value) {
                console.error('Timezone not set before submission');
                timezoneInput.value = Intl.DateTimeFormat().resolvedOptions().timeZone;
            }

            form.submit();
            return false;
        }
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('css/faltpicker.css') }}">
    <style>
        .step {
            transition: all 0.3s ease;
        }
    </style>
@endpush
