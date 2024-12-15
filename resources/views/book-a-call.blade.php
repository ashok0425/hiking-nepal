@extends('layouts.website')

@section('title', 'Hiking Nepal')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .flatpickr-calendar {
            box-shadow: none;
            background-color: transparent;
            color: #fff !important;
        }

        .flatpickr-month,
        .flatpickr-weekday,
        .flatpickr-next-month {
            color: #fff !important;
        }

        .flatpickr-day,
        .nextMonthDay {
            color: #fff !important;
        }

        .flatpickr-day:hover,
        .nextMonthDay:hover {
            background-color: #767676 !important;
        }

        .flatpickr-next-month,
        .flatpickr-prev-month {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .flatpickr-next-month svg,
        .flatpickr-prev-month svg {
            fill: #fff;
        }

        .flatpickr-disabled {
            color: rgba(119, 119, 119, 1) !important;
        }

        .flatpickr-month {
            margin-bottom: 10px;
        }

        .selected {
            background-color: #fff !important;
            color: var(--brand-color) !important;
        }

        #datepicker {
            display: none;
        }

        .input-group {
            display: none;
        }
    </style>
@endpush

@section('content')

    <div style="max-width: 900px;" class="mx-auto">

        @if (!request()->has('submitted'))
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
                        <form action="{{ route('book-a-call') }}" method="get" class="form-light">

                            {{-- for testing only --}}
                            <input type="hidden" name="submitted" value="yes">

                            <div class="mb-4">
                                <div class="fw-bold mb-2">Meeting duration</div>
                                <div class="bg-light py-2 text-center border">25 mins</div>
                                <input type="hidden" name="duration" value="25">
                            </div>

                            <div class="mb-4">
                                <div class="fw-bold mb-2">What time works best?</div>
                                <div>Showing times for <span id="selectedDate" class="fw-bold">Please select a date</span>
                                </div>
                                <input type="hidden" name="selected_date" id="hiddenSelectedDate">
                            </div>

                            <div class="mb-4">
                                {{-- <label for="timeSlot" class="form-label">Select Time Slot</label> --}}
                                <select class="form-select" id="timeSlot" name="time_slot" required>
                                    <option value="" selected disabled>Choose a time slot</option>
                                    <option value="09:00">9:00 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="14:00">2:00 PM</option>
                                    <option value="15:00">3:00 PM</option>
                                    <option value="16:00">4:00 PM</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="notes" class="form-label fw-bold">Optional</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"
                                    placeholder="Enter the time that best suits for you..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="container my-5 py-5">

                <div class="text-center mb-5">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('logo.png') }}" alt="hiking nepal logo" width="208" height="auto">
                    </a>
                </div>

                <div class="brand-shadow-lg p-3 p-md-5">

                    <form class="form-light">

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
                                <input type="text" class="form-control" placeholder="Enter your last name" id="lastName"
                                    name="lastName" required>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="email" class="form-label fw-bold">Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" placeholder="Enter your email address" class="form-control"
                                id="email" name="email" required>
                        </div>

                        <div class="mb-5">
                            <label for="comments" class="form-label fw-bold">Comments <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" placeholder="Write your comment" id="comments" name="comments" rows="10"></textarea>
                        </div>

                        <div class="fw-bold mb-2">Data Privacy</div>

                        <div class="p-3 mb-5" style="background-color: rgba(242, 242, 242, 1)">
                            <p class="small">At Hiking Nepal, we respect your privacy and are committed to protecting your
                                personal
                                information. We collect and use data only to provide and improve our services. By using this
                                website, you agree to the collection and use of information in accordance with our Privacy
                                Policy.</p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="terms" required>
                                <label class="form-check-label small" for="terms">By clicking "I Agree" or using this
                                    site,
                                    you
                                    confirm that you have read and accept our Privacy Policy.</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#bookingModal">
                                Next<i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center mb-5">
                            <img src="{{ asset('images/check.png') }}" alt="check" width="150" height="auto">
                            <div class="fs-4 fw-bold text-success">Booking confirmed</div>
                            <div>An Invitation has been emailed to you</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const picker = flatpickr("#datepicker", {
                inline: true,
                appendTo: document.getElementById("inline-calendar"),
                minDate: "today",
                dateFormat: "Y-m-d",
                disable: [
                    function(date) {
                        // Disable weekends
                        return (date.getDay() === 0 || date.getDay() === 6);
                    }
                ],
                onChange: function(selectedDates, dateStr, instance) {
                    const formattedDate = new Date(dateStr).toLocaleDateString('en-US', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric'
                    });
                    document.getElementById('selectedDate').textContent = formattedDate;
                }
            });
        });
    </script>
@endpush
