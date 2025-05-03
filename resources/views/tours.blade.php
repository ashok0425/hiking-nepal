@extends('layouts.website')

@section('title', $tourPackage->meta_title ?? $tourPackage->title)

@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="{{ isset($tourPackage->meta_description) ? $tourPackage->meta_description : "Discover the beauty of Nepal with our amazing hiking and trekking packages. Experience breathtaking mountain views, cultural heritage sites and unforgettable adventures." }}">
    <meta name="keywords"
        content="{{ isset($tourPackage->meta_keywords) ? $tourPackage->meta_keywords : 'nepal travel blog, nepal trekking blog, hiking nepal blog, nepal hiking stories, nepal trekking experiences, nepal adventure blog' }}">
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="{{ isset($tourPackage->meta_title) ? $tourPackage->meta_title : 'Welcome - Hiking Nepal' }}">
    <meta property="og:description"
        content="{{ isset($tourPackage->meta_description) ? $tourPackage->meta_description : "Discover the beauty of Nepal with our amazing hiking and trekking packages. Experience breathtaking mountain views, cultural heritage sites and unforgettable adventures." }}">
    <meta property="og:image"
        content="{{ isset($tourPackage->gallery[0]) ? Storage::disk('public')->url($tourPackage->gallery[0]) : asset('images/deals-cover.webp') }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"
        content="{{ isset($tourPackage->meta_title) ? $tourPackage->meta_title : 'Welcome - Hiking Nepal' }}">
    <meta name="twitter:description"
        content="{{ isset($tourPackage->meta_description) ? $tourPackage->meta_description : "Discover the beauty of Nepal with our amazing hiking and trekking packages. Experience breathtaking mountain views, cultural heritage sites and unforgettable adventures." }}">
    <meta name="twitter:image"
        content="{{ isset($tourPackage->gallery[0]) ? Storage::disk('public')->url($tourPackage->gallery[0]) : asset('images/deals-cover.webp') }}">
@endsection

@section('content')
    <section class="position-relative overflow-hidden d-flex justify-content-center align-items-center"
        style="height: 700px;">
        <img src="{{ $tourPackage->galleryImages()[0] ?? asset('images/tour.webp') }}" alt="{{ $tourPackage->title }}"
            class="w-100 position-absolute start-0 top-0 tour-hero-image">
        <div class="container">
            <h1 class="mb-3 z-1 position-relative text-uppercase text-white text-center mx-auto" style="max-width: 768px;">
                {{ $tourPackage->title }} <span class="fs-4 fw-normal">{{ $tourPackage->tour_duration }}</span>
            </h1>

            <p class="position-relative text-center text-white fs-3">
                @if ($tourPackage->hasDiscount())
                    <del class="text-danger">USD {{ number_format($tourPackage->sale_price_per_person) }}</del>
                    <span>USD {{ number_format($tourPackage->discounted_price) }} per person</span>
                @else
                    <span>USD {{ number_format($tourPackage->sale_price_per_person) }} per person</span>
                @endif
            </p>

            @if ($tourPackage->perks)
                <div class="position-relative mx-auto flex-wrap d-flex justify-content-center gap-4 w-100 mt-5 pt-5"
                    style="max-width: 800px">

                    @foreach (explode(',', $tourPackage->perks) as $perk)
                        <div class="service-header text-capitalize">{{ $perk }}</div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

    <nav class="navbar navbar-expand-lg bg-body-white brand-shadow fw-bold bg-white tour-sub-nav">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#tourOverview">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#tourItinerary">Itinerary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#useful-information">Useful Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#departures">Departure Dates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#tourFaqs">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#tourReviews">Reviews</a>
                    </li>
                </ul>
            </div>

            <a class="btn btn-cta" href="{{ route('book-a-call') }}">Book Now</a>
        </div>
    </nav>

    <main class="container">
        <div class="row">
            <div class="col-lg-8 tour-content">
                <div class="table-responsive">
                    <table class="table table-bordered my-5">
                        <tbody>
                            <tr>
                                <td class="col-3">
                                    <i class="fas fa-hiking text-cta me-2"></i>
                                    Activities
                                </td>
                                <td class="col-3">
                                    {{ $tourPackage->activities->pluck('name')->implode(', ') ?: '-' }}
                                </td>

                                <td class="col-3">
                                    <i class="fas fa-heartbeat text-cta me-2"></i>
                                    Fitness Level
                                </td>
                                <td class="col-3">{{ $tourPackage->fitness_level ?: '-' }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-mountain text-cta me-2"></i>
                                    Max Elevation
                                </td>
                                <td>{{ $tourPackage->max_elevation ?: '-' }}</td>

                                <td>
                                    <i class="fas fa-car text-cta me-2"></i>
                                    Commute
                                </td>
                                <td>{{ $tourPackage->commute ?: '-' }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-calendar-alt text-cta me-2"></i>
                                    Best Month
                                </td>
                                <td>{{ $tourPackage->best_time ?: '-' }}</td>

                                <td>
                                    <i class="fas fa-users text-cta me-2"></i>
                                    Group Size
                                </td>
                                <td>{{ $tourPackage->group_size ?: '-' }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-plane-arrival text-cta me-2"></i>
                                    Arrival on
                                </td>
                                <td>{{ $tourPackage->arrival_at ?: '-' }}</td>
                                <td>
                                    <i class="fas fa-plane-departure text-cta me-2"></i>
                                    Depart From
                                </td>
                                <td>{{ $tourPackage->departure_from ?: '-' }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-utensils text-cta me-2"></i>
                                    Meal
                                </td>
                                <td>{{ $tourPackage->meal ?: '-' }}</td>
                                <td>
                                    <i class="fas fa-clock text-cta me-2"></i>
                                    Duration
                                </td>
                                <td>{{ $tourPackage->tour_duration ?: '-' }}</td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fas fa-bed text-cta me-2"></i>
                                    Stay
                                </td>
                                <td>{{ $tourPackage->stay ?: '-' }}</td>
                                <td>
                                    <i class="fas fa-dollar-sign text-cta me-2"></i>
                                    Price
                                </td>
                                <td>
                                    USD {{ number_format($tourPackage->getPrice()) }} per person
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mb-4" id="tourOverview">
                    {!! $tourPackage->overview !!}
                </div>

                @if ($tourPackage->alt_chart)
                    <div class="mb-4">
                        <h2 class="mb-4">Map</h2>
                        <img src="{{ asset('/storage/' . $tourPackage->map) }}" alt="map image">
                    </div>
                @endif

                @if ($tourPackage->alt_chart)
                    <div class="mb-4">
                        <h2 class="mb-4">Altitude Chart</h2>
                        <img src="{{ asset('/storage/' . $tourPackage->alt_chart) }}" alt="altitude chart image">
                    </div>
                @endif

                @if ($tourPackage->video)
                    <div class="mb-4">
                        <h2 class="mb-4">Video</h2>
                        <iframe width="100%" height="350" src="{{ $tourPackage->video }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                @endif

                <div class="mb-4" id="tourItinerary">
                    <h2 class="mb-4">DETAILED ITINERARY</h2>

                    @if ($tourPackage->itinerary)
                        {!! $tourPackage->itinerary !!}
                    @else
                        <div class="text-center text-muted mb-5">
                            <p>Please contact us for detailed itinerary and other information about this tour.</p>
                        </div>
                    @endif
                </div>

                {{-- DEPARTURE --}}
                <div class="d-flex justify-content-between align-items-center mb-4" id="departures">
                    <h2>DEPARTURE DATES</h2>
                    <form action="{{ route('tours', ['slug' => $tourPackage->slug]) }}#departures" method="get">
                        <select class="form-select" id="monthSelect" name="month" onchange="this.form.submit()"
                            style="min-width: 150px;">
                            @foreach (range(1, 12) as $m)
                                <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                                    {{ Carbon\Carbon::create(null, $m)->format('F') }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <div class="table-responsive trips-table mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-muted">START DATE</th>
                                <th scope="col" class="text-muted">END DATE</th>
                                <th scope="col" class="text-muted">STATUS</th>
                                <th scope="col" class="text-muted">PRICES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($departures as $departure)
                                <tr>
                                    <th scope="row">{{ $departure->start_date->format('jS M') }}</th>
                                    <td class="fw-bold">
                                        {{ $departure->end_date->format('jS M') }}
                                    </td>
                                    <td>
                                        Limited Seats
                                    </td>
                                    <td>
                                        <div class="fw-bold mb-1">
                                            $ {{ number_format($tourPackage->getPrice()) }}
                                        </div>
                                        <div class="small text-muted">
                                            <a href="{{ route('book-a-call', ['departure' => $departure->id]) }}"
                                                class="btn btn-primary">
                                                Join us <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        No departures found for {{ Carbon\Carbon::create(null, $month)->format('F') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- FAQ --}}
                <h2 class="mb-4" id="tourFaqs">FAQ</h2>
                <div class="accordion accordion-flush mx-auto mb-5" id="faqAccordion" style="max-width: 996px">
                    @forelse($faqs as $index => $faq)
                        <div class="accordion-item brand-shadow mb-4 p-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}"
                                    aria-expanded="false" aria-controls="faq{{ $index }}">
                                    {{ $faq['question'] }}
                                </button>
                            </h3>
                            <div id="faq{{ $index }}" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ $faq['answer'] }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted">
                            <p>No FAQs available for this tour.</p>
                        </div>
                    @endforelse
                </div>

                <h2 class="mb-4" id="tourReviews">REVIEWS</h2>
                @if ($tourPackage->reviews->count() > 0)
                    <div id="testimonials" class="splide mb-5" aria-label="Testimonial">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($tourPackage->reviews as $review)
                                    <li class="splide__slide">
                                        <x-testimonial-card :review="$review" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="text-center text-muted mb-5">
                        <p>No reviews yet.</p>
                    </div>
                @endif

                <h2 class="mb-4">RELATED TRIPS</h2>

                <div class="row gy-4 mb-5">
                    @foreach ($packages as $package)
                        <div class="col-md-6">
                            <x-package-card :package="$package" />
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4 py-5">
                <div class="bg-cta text-white p-3 mb-3">
                    <div class="d-flex justify-content-center gap-2 align-items-center">
                        <div>
                            <div class="fw-bold">All Inclusive cost</div>
                            <div class="fw-bold fs-5">
                                USD {{ number_format($tourPackage->getPrice()) }}
                            </div>
                        </div>
                        <img src="{{ asset('images/best-price.webp') }}" alt="sale" width="120" height="120">
                    </div>

                    <table class="table table-bordered mb-3">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">1 person</th>
                                <th class="text-center">2-7 person</th>
                                <th class="text-center">8+ person</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <div class="fw-bold">
                                        $ {{ number_format($tourPackage->getPrice()) }}
                                    </div>
                                    <small class="text-muted">Partial Pay</small>
                                </td>
                                <td class="text-center">
                                    <div class="fw-bold">
                                        $
                                        {{ number_format($tourPackage->sale_price_two_plus_per_person > 0 ? $tourPackage->sale_price_two_plus_per_person : $tourPackage->getPrice()) }}
                                        / per
                                    </div>
                                    <small class="text-muted">Partial Pay</small>
                                </td>
                                <td class="text-center">
                                    <div class="fw-bold">
                                        $
                                        {{ number_format($tourPackage->sale_price_eight_plus_per_person > 0 ? $tourPackage->sale_price_eight_plus_per_person : $tourPackage->getPrice()) }}
                                        / per
                                    </div>
                                    <small class="text-muted">Partial Pay</small>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <a class="btn bg-success text-white w-100 blink-button" href="{{ route('book-trip') }}">BOOK NOW</a>
                </div>

                <div class="position-sticky" style="top: 198px;">

                    <form method="post" action="{{ route('book-a-call') }}" id="queryForm"
                        class="bg-cta text-white p-3 mb-3">
                        @csrf
                        <div class="fw-bold mb-4">Send us your queries or requests</div>

                        @error('g-recaptcha-response')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <input type="text" class="form-control py-2 @error('firstName')  is-invalid @enderror"
                                id="firstName" name="firstName" value="{{ old('firstName') }}"
                                placeholder="Enter First Name" required>
                            @error('firstName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control py-2 @error('lastName') is-invalid @enderror"
                                id="lastName" name="lastName" value="{{ old('lastName') }}"
                                placeholder="Enter Last Name" required>
                            @error('lastName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control py-2 @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}"
                                placeholder="Enter Email Address" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="tel" class="form-control py-2 @error('phone') is-invalid @enderror"
                                id="phone" name="phone" value="{{ old('phone') }}"
                                placeholder="Enter Phone Number" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <textarea class="form-control py-2 @error('comments') is-invalid @enderror" id="message" name="comments" rows="1"
                                placeholder="Enter Your Message" required>{{ old('comments') }}</textarea>
                            @error('comments')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <button type="submit" class="btn bg-white text-cta w-100 g-recaptcha"
                            data-sitekey="6LdphbAqAAAAAFaAnoPYmK6A8a9GU3e8gMJc_N_A" data-callback='onSubmit'
                            data-action='submit'>Enquire Now</button>
                            <div class="mt-2 small fw-light fst-italic">
                                Your information will never be shared with anyone outside our company
                            </div>
                    </form>

                    <div class="bg-cta text-white p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>We Accept</div>
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 20.5C2.45 20.5 1.97933 20.3043 1.588 19.913C1.19667 19.5217 1.00067 19.0507 1 18.5V7.5H3V18.5H20V20.5H3ZM7 16.5C6.45 16.5 5.97933 16.3043 5.588 15.913C5.19667 15.5217 5.00067 15.0507 5 14.5V6.5C5 5.95 5.196 5.47933 5.588 5.088C5.98 4.69667 6.45067 4.50067 7 4.5H21C21.55 4.5 22.021 4.696 22.413 5.088C22.805 5.48 23.0007 5.95067 23 6.5V14.5C23 15.05 22.8043 15.521 22.413 15.913C22.0217 16.305 21.5507 16.5007 21 16.5H7ZM9 14.5C9 13.95 8.80433 13.4793 8.413 13.088C8.02167 12.6967 7.55067 12.5007 7 12.5V14.5H9ZM19 14.5H21V12.5C20.45 12.5 19.9793 12.696 19.588 13.088C19.1967 13.48 19.0007 13.9507 19 14.5ZM14 13.5C14.8333 13.5 15.5417 13.2083 16.125 12.625C16.7083 12.0417 17 11.3333 17 10.5C17 9.66667 16.7083 8.95833 16.125 8.375C15.5417 7.79167 14.8333 7.5 14 7.5C13.1667 7.5 12.4583 7.79167 11.875 8.375C11.2917 8.95833 11 9.66667 11 10.5C11 11.3333 11.2917 12.0417 11.875 12.625C12.4583 13.2083 13.1667 13.5 14 13.5ZM7 8.5C7.55 8.5 8.021 8.30433 8.413 7.913C8.805 7.52167 9.00067 7.05067 9 6.5H7V8.5ZM21 8.5V6.5H19C19 7.05 19.196 7.521 19.588 7.913C19.98 8.305 20.4507 8.50067 21 8.5Z"
                                    fill="white" />
                            </svg>
                        </div>

                        <hr>

                        <div class="d-flex gap-2 justify-content-between align-items-center w-100 px-3">
                            <img src="{{ asset('images/pay_visa.webp') }}" alt="ammex" width="60">
                            <img src="{{ asset('images/pay_unionpay.webp') }}" alt="ammex" width="60">
                            <img src="{{ asset('images/pay_ammex.webp') }}" alt="ammex" width="60">
                            <img src="{{ asset('images/master-card.webp') }}" alt="ammex" width="60">
                        </div>

                    </div>

                    <div class="bg-cta text-white p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>Contact Us</div>
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.285 8.844C3.70091 9.00127 3.18497 9.34674 2.81708 9.82689C2.44919 10.307 2.24987 10.8951 2.25 11.5V14.5C2.25 15.2293 2.53973 15.9288 3.05546 16.4445C3.57118 16.9603 4.27065 17.25 5 17.25H7.5C7.69891 17.25 7.88968 17.171 8.03033 17.0303C8.17098 16.8897 8.25 16.6989 8.25 16.5V9.5C8.25 9.30109 8.17098 9.11032 8.03033 8.96967C7.88968 8.82902 7.69891 8.75 7.5 8.75H5.815C6.244 6.28 8.759 4.25 12 4.25C15.241 4.25 17.756 6.28 18.185 8.75H16.5C16.3011 8.75 16.1103 8.82902 15.9697 8.96967C15.829 9.11032 15.75 9.30109 15.75 9.5V16.5C15.75 16.914 16.086 17.25 16.5 17.25H18.163C17.9942 17.9619 17.59 18.596 17.016 19.0497C16.442 19.5034 15.7317 19.7502 15 19.75H13.855C13.6809 19.3197 13.3627 18.9634 12.9547 18.7421C12.5467 18.5207 12.0745 18.4482 11.6189 18.5368C11.1633 18.6255 10.7528 18.8698 10.4576 19.228C10.1624 19.5862 10.001 20.0359 10.001 20.5C10.001 20.9641 10.1624 21.4138 10.4576 21.772C10.7528 22.1302 11.1633 22.3745 11.6189 22.4632C12.0745 22.5518 12.5467 22.4793 12.9547 22.2579C13.3627 22.0366 13.6809 21.6803 13.855 21.25H15C17.4 21.25 19.384 19.47 19.705 17.159C20.2914 17.0035 20.81 16.6583 21.1799 16.1774C21.5497 15.6965 21.7502 15.1067 21.75 14.5V11.5C21.7501 10.8951 21.5508 10.307 21.1829 9.82689C20.815 9.34674 20.2991 9.00127 19.715 8.844C19.333 5.34 15.926 2.75 12 2.75C8.074 2.75 4.667 5.34 4.285 8.844Z"
                                    fill="white" />
                            </svg>

                        </div>

                        <hr>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-cta text-white">
                                Speak to one of our travel consultants
                            </li>
                            <li class="list-group-item bg-cta text-white">
                                <i class="fas fa-phone me-2"></i>
                                Call Us (24/7) : <a href="tel:+9779802342080" class="text-white">+977 9802342080</a>
                            </li>
                            <li class="list-group-item bg-cta text-white">
                                <img src="{{ asset('images/whatsapp.webp') }}" alt="whataspp" height="22"
                                    width="auto" class="me-1">
                                WhatsApp (24/7) : <a href="https://api.whatsapp.com/send?phone=9779802342080"
                                    class="text-white">+977-9802342080</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @include('inc.book-a-call-cta')
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

        var testimonials = new Splide('#testimonials', {
            type: 'loop',
            perPage: 2,
            perMove: 1,
            gap: '2rem',
            pagination: false,
            breakpoints: {
                767: {
                    perPage: 1,
                }
            }
        });
        testimonials.mount();
    </script>
@endpush
