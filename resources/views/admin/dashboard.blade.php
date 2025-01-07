@extends('admin.layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="welcome-section mb-4">
        <h2>Welcome back, {{ Auth::user()->name }}! 👋</h2>
        {{-- <p class="lead">Here's an overview of your adventure management portal.</p> --}}
    </div>

    <div class="row">
        <!-- Callback Stats -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3 class="display-metric">{{ $metrics['callbacks']['pending'] }}</h3>
                    <p>Pending Callbacks</p>
                </div>
                <div class="icon"><i class="fas fa-phone"></i></div>
            </div>
        </div>

        <!-- Booking Stats -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 class="display-metric">{{ $metrics['bookings']['total'] }}</h3>
                    <p>Total Bookings</p>
                </div>
                <div class="icon"><i class="fas fa-shopping-cart"></i></div>
            </div>
        </div>

        <!-- Package Stats -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 class="display-metric">{{ $metrics['packages']['active'] }}</h3>
                    <p>Active Packages</p>
                </div>
                <div class="icon"><i class="fas fa-hiking"></i></div>
            </div>
        </div>

        <!-- Review Stats -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 class="display-metric">{{ number_format($metrics['reviews']['average_rating'], 1) }}</h3>
                    <p>Average Rating</p>
                </div>
                <div class="icon"><i class="fas fa-star"></i></div>
            </div>
        </div>

    </div>

    <div class="row">
        <!-- Recent Bookings -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title p-0">Recent Bookings</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metrics['bookings']['recent'] as $booking)
                                    <tr>
                                        <td>{{ $booking->first_name }} {{ $booking->last_name }}</td>
                                        <td>{{ $booking->date ? $booking->date->format('M d, Y') : 'Not set' }}</td>
                                        <td><span
                                                class="badge bg-{{ $booking->status === 'confirmed' ? 'success' : 'warning' }}">{{ $booking->status }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Departures -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title p-0">Upcoming Departures</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Start Date</th>
                                    <th>Seats</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metrics['departures']['upcoming'] as $package)
                                    @foreach ($package->departures as $departure)
                                        <tr>
                                            <td>{{ $package->title }}</td>
                                            <td>{{ $departure->start_date->format('M d, Y') }}</td>
                                            <td>{{ $departure->booked_seats }}/{{ $departure->total_seats }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .display-metric {
            font-size: 2rem !important;
        }
    </style>
@endpush
