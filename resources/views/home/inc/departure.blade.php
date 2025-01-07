<section id="departures">
    <div class="container my-5">
        <div class="fw-bold d-inline-flex align-items-center mb-3">
            <span style="width: 50px; height:1px; background-color: var(--brand-color)"
                class="d-inline-block my-2 me-2"></span>
            DEPARTURE DATES
        </div>

        <div class="mb-5 d-flex gap-3 justify-content-md-between flex-column flex-md-row align-items-center">
            <h2 class="mb-0">Join Fixed Departure Trips</h2>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Carbon\Carbon::create(null, $month)->format('F') }}, {{ $year }}
                </button>
                <div class="dropdown-menu" style="min-width: 250px;">
                    <form class="px-4 py-3" action="{{ url('/#departures') }}" method="GET">
                        <div class="mb-3">
                            <label for="monthSelect" class="form-label">Month</label>
                            <select class="form-select" id="monthSelect" name="month">
                                @foreach (range(1, 12) as $m)
                                    <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                                        {{ Carbon\Carbon::create(null, $m)->format('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="yearSelect" class="form-label">Year</label>
                            <select class="form-select" id="yearSelect" name="year">
                                @php
                                    $currentYear = date('Y');
                                    $endYear = $currentYear + 2;
                                @endphp
                                @for ($y = $currentYear; $y <= $endYear; $y++)
                                    <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>
                                        {{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive trips-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-muted">TRIP NAME</th>
                        <th scope="col" class="text-muted">DEPARTURE DATE</th>
                        <th scope="col" class="text-muted">STATUS</th>
                        <th scope="col" class="text-muted">PRICES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departures as $departure)
                        <tr>
                            <th scope="row" style="max-width: 360px; text-wrap: wrap;">
                                {{ $departure->package->title }}
                            </th>
                            <td>
                                <div class="fw-bold">{{ $departure->package->tour_duration ?? '-' }}</div>
                                <div class="small text-muted">
                                    From {{ $departure->start_date->format('jS M') }} -
                                    {{ $departure->end_date->format('jS M') }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-2 mb-2">
                                    <div>
                                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22 10.5L19.56 7.72004L19.9 4.04004L16.29 3.22004L14.4 0.0400391L11 1.50004L7.6 0.0400391L5.71 3.22004L2.1 4.03004L2.44 7.71004L0 10.5L2.44 13.28L2.1 16.97L5.71 17.79L7.6 20.97L11 19.5L14.4 20.96L16.29 17.78L19.9 16.96L19.56 13.28L22 10.5ZM9 15.5L5 11.5L6.41 10.09L9 12.67L15.59 6.08004L17 7.50004L9 15.5Z"
                                                fill="#FF8C00" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Guaranteed</div>
                                        @php
                                            $progressPercent =
                                                ($departure->booked_seats / $departure->total_seats) * 100;
                                        @endphp

                                        <div class="small text-muted">
                                            {{ $departure->total_seats - $departure->booked_seats }} seats left
                                        </div>
                                    </div>

                                </div>
                                <div class="progress" role="progressbar" aria-label="Success example"
                                    aria-valuenow="{{ $progressPercent }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-danger" style="width: {{ $progressPercent }}%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold mb-1">
                                    @if ($departure->package->hasDiscount())
                                        <del
                                            class="text-danger small fw-light">${{ number_format($departure->package->sale_price_per_person) }}</del>
                                        <span
                                            class="text-success">${{ number_format($departure->package->discounted_price) }}</span>
                                    @else
                                        <span
                                            class="text-success">${{ number_format($departure->package->sale_price_per_person) }}</span>
                                    @endif
                                </div>

                                <div class="small text-muted">
                                    <a href="{{ route('tours', $departure->package->slug) }}" class="btn btn-primary">
                                        Join us <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">
                                No departures found for {{ Carbon\Carbon::create(null, $month)->format('F') }},
                                {{ $year }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
