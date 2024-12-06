@extends('layouts.website')

@section('title', 'Hiking Nepal')

@push('styles')
    <style>
        .booking-steps {
            position: relative;
            padding: 20px 0;
            max-width: 960px;
            margin: 0 auto;
        }

        .booking-steps:before {
            content: '';
            position: absolute;
            top: 55px;
            left: 10%;
            right: 10%;
            height: 10px;
            background: #dee2e6;
            z-index: -1;
        }

        .booking-steps[data-completed-steps="1"]:before {
            background: linear-gradient(to right, #004B87 20%, #dee2e6 20%);
        }

        .booking-steps[data-completed-steps="2"]:before {
            background: linear-gradient(to right, #004B87 40%, #dee2e6 40%);
        }

        .booking-steps[data-completed-steps="3"]:before {
            background: linear-gradient(to right, #004B87 60%, #dee2e6 60%);
        }

        .booking-steps[data-completed-steps="4"]:before {
            background: linear-gradient(to right, #004B87 80%, #dee2e6 80%);
        }

        .booking-steps[data-completed-steps="5"]:before {
            background: linear-gradient(to right, #004B87 100%, #dee2e6 100%);
        }

        .step-icon {
            width: 80px;
            height: 80px;
            background: white;
            border: 2px solid #004B87;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            transition: all 0.3s ease;
        }

        .step-icon i {
            color: #004B87;
            font-size: 2.2rem;
            transition: all 0.3s ease;
        }

        .step-icon.completed {
            background: #004B87;
            border-color: #004B87;
        }

        .step-icon.completed i {
            color: white;
        }

        .step-icon.active {
            background: white;
            border-color: #004B87;
            box-shadow: 0 0 0 3px rgba(0, 75, 135, 0.2);
        }

        .step-text {
            /* font-size: 0.8rem; */
            color: #000;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .booking-steps:before {
                display: none;
            }

            .step-icon {
                width: 60px;
                height: 60px;
            }

            .step-icon i {
                font-size: 1.5rem;
            }

            .step-text {
                font-size: 0.7rem;
            }
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .traveller-type {
            width: 150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--brand-color);
            background-color: rgba(242, 242, 242, 1);
        }

        .dates-option {
            color: var(--brand-color);
            background-color: rgba(242, 242, 242, 1);
            padding: 20px;
        }

        .traveller-type:hover,
        .dates-option:hover {
            background-color: #e9ecef;
        }

        .selected {
            background-color: var(--brand-color) !important;
            color: white !important;
        }

        .step-3 .form-check {
            border: 1px solid rgba(168, 166, 166, 1);
            padding: 10px 30px;
        }
    </style>
@endpush

@section('content')
    <div class="container py-5 my-5" style="max-width: 1200px;">
        <h1 class="text-center mb-5">Select the plan that best suits you</h1>

        <div class="brand-shadow py-5 mb-5">
            <div class="booking-steps" data-completed-steps="2">
                <div class="row g-0 text-center justify-content-between">
                    <div class="col-4 col-md-2 mb-4 mb-md-0">
                        <div class="step-icon mb-2 completed">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="step-text">Who</span>
                    </div>

                    <div class="col-4 col-md-2 mb-4 mb-md-0">
                        <div class="step-icon mb-2 completed">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <span class="step-text">When</span>
                    </div>

                    <div class="col-4 col-md-2 mb-4 mb-md-0">
                        <div class="step-icon mb-2">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span class="step-text">Where</span>
                    </div>

                    <div class="col-4 col-md-2 mb-4 mb-md-0">
                        <div class="step-icon mb-2">
                            <i class="fas fa-bed"></i>
                        </div>
                        <span class="step-text">Accommodations</span>
                    </div>

                    <div class="col-4 col-md-2 mb-4 mb-md-0">
                        <div class="step-icon mb-2">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <span class="step-text">Budget</span>
                    </div>

                    <div class="col-4 col-md-2">
                        <div class="step-icon mb-2">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <span class="step-text">Payment</span>
                    </div>
                </div>
            </div>
        </div>

        @include('booking.inc.step-1')
        @include('booking.inc.step-2')
        @include('booking.inc.step-3')
        @include('booking.inc.step-4')
        @include('booking.inc.step-5')
        @include('booking.inc.step-6')
    </div>
@endsection
