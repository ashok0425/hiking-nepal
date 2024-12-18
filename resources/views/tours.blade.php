@extends('layouts.website')

@section('title', 'Hiking Nepal')

@section('content')
    <section class="position-relative overflow-hidden d-flex justify-content-center align-items-center"
        style="height: 700px;">
        <img src="{{ asset('images/tour.jpg') }}" alt="head cover" class="w-100 position-absolute start-0 top-0"
            style="height: 700px; object-fit:cover; filter: brightness(80%) contrast(110%);">
        <div class="container">
            <h1 class="mb-3 z-1 position-relative text-uppercase text-white text-center">Everest Trek <span
                    class="fs-4 fw-normal">14
                    Days</span>
            </h1>

            <p class="position-relative text-center text-white fs-3">USD 1,499 per person</p>

            <div class="position-relative mx-auto flex-wrap d-flex justify-content-center gap-4 w-100 mt-5 pt-5"
                style="max-width: 800px">
                <div class="service-header">Accommodation</div>
                <div class="service-header">Dining</div>
                <div class="service-header">Activities</div>
                <div class="service-header">Transports</div>
                <div class="service-header">Extras</div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="table-responsive">
                    <table class="table table-bordered my-5">
                        <tbody>
                            <tr>
                                <td class="col-3">
                                    <i class="fas fa-hiking text-primary me-2"></i>
                                    Activities
                                </td>
                                <td class="col-3">Trekking</td>

                                <td class="col-3">
                                    <i class="fas fa-heartbeat text-primary me-2"></i>
                                    Fitness Level
                                </td>
                                <td class="col-3">Moderate to Strenuous</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-mountain text-primary me-2"></i>
                                    Max Elevation
                                </td>
                                <td>(5,500m/18,208ft) Everest</td>

                                <td>
                                    <i class="fas fa-car text-primary me-2"></i>
                                    Commute
                                </td>
                                <td>Private Vehicle/Flight</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-calendar-alt text-primary me-2"></i>
                                    Best Month
                                </td>
                                <td>Mar to May & Sept to Dec</td>

                                <td>
                                    <i class="fas fa-users text-primary me-2"></i>
                                    Group Size
                                </td>
                                <td>1 - 20 persons</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-plane-arrival text-primary me-2"></i>
                                    Arrival on
                                </td>
                                <td>Kathmandu</td>
                                <td>
                                    <i class="fas fa-plane-departure text-primary me-2"></i>
                                    Depart From
                                </td>
                                <td>Kathmandu</td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-utensils text-primary me-2"></i>
                                    Meal
                                </td>
                                <td>Breakfast in Kathmandu and all meals during trek</td>
                                <td>
                                    <i class="fas fa-clock text-primary me-2"></i>
                                    Duration
                                </td>
                                <td>14 days</td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fas fa-bed text-primary me-2"></i>
                                    Stay
                                </td>
                                <td>Deluxe accommodation in Kathmandu </td>
                                <td>
                                    <i class="fas fa-dollar-sign text-primary me-2"></i>
                                    Price
                                </td>
                                <td>USD <span class="fw-bold">1595</span> per person</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 class="mb-4">Take pride on being on the top of world’s 1st highest mouuntain</h2>

                <p>Everest Base Camp Trek offers you a spectacular view of towering mountains of Everest Region from vintage
                    points of Kalapatthar (5550 m) and Base Camp (5357m). The main highligts of the trip is to explore
                    Sherpa
                    Communities their Culture and civilization as well as to visit the oldest and largest monastery of the
                    region, Tengboche.</p>

                <p>Trekking to Everest Base Camp is adventurous, exciting as well as challenging. There are some sections
                    that
                    consist of rough and challenging terrain but with high determination and  basic fitness level one could
                    acheive their dream of being at base of mighty Mt. Everest (8848m/29022ft). Best season To Trek Everest
                    Base
                    Camp</p>

                <p>Everest Base Camp can be acheived throughout the year but to get most out from Everest Base Camp
                    Trek, you
                    have to select the best months.</p>

                <p>Spring (March, April and May) and Autumn (September, October, November) is the main trekking season in
                    Nepal. The reason behind is clear, sunny & pleasant weather. And most importantly you can enjoy the
                    Himalayan vista than other season.</p>

                <p>Monsoon (Jun, July, August) – This is generally a monsoon season in Nepal, You need to carry your rain
                    gears
                    and be ready for slippery trails.</p>

                <p>Winter (December, January, Feburary) – At this time it can be extreme cold with strong cold winds, icy
                    pathway, snowfall, and temperatures reach minus degrees. If you love this season then it might be the
                    best
                    option for you.</p>

                <p>Trekkers who want to escape overcrowded season of Autumn and Spring season then Winter and Monsoon Season
                    is
                    perfect for you.</p>

                <p>If you are not satisfied with this itinerary or if you want to customize this package in your timeline or
                    budget, then you could contact us, or email to info@hikingnepal.com</p>

                <h2 class="mb-4">EVEREST CAMP TREKKING ROUTE</h2>

                <img src="{{ asset('images/map.jpg') }}" alt="map" class="w-100 mb-5">

                <h2 class="mb-4">OUTLINE ITINERARY</h2>

                <table class="table table-striped my-5">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Itinerary</th>
                            <th>Maximum Altitude</th>
                            <th>Walking / Hiking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Day 01</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                        <tr>
                            <td>Day 02</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                        <tr>
                            <td>Day 03</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                        <tr>
                            <td>Day 04</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                        <tr>
                            <td>Day 05</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                        <tr>
                            <td>Day 06</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                        <tr>
                            <td>Day 07</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                        <tr>
                            <td>Day 08</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                        <tr>
                            <td>Day 09</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                        <tr>
                            <td>Day 10</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                        <tr>
                            <td>Day 11</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                        <tr>
                            <td>Day 12</td>
                            <td>Arrival in Kathmandu</td>
                            <td>1,350m / 4,429 ft</td>
                            <td>6 - 7 hrs</td>
                        </tr>
                    </tbody>
                </table>

                @for ($i = 1; $i <= 3; $i++)
                    <div class="mb-5">
                        <h2 class="mb-4">Day {{ $i }}: Arrival in Kathmandu (1,350m/4,429ft)</h2>
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">
                                <i class="fas fa-plane text-primary me-2"></i>
                                Flight Time: 35 to 45 mins
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-bed text-primary me-2"></i>
                                Accommodation: Tea House
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-utensils text-primary me-2"></i>
                                Meals: Welcome Dinner
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-route text-primary me-2"></i>
                                Trek Distance: 6.2km / 3.8 miles
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-hiking text-primary me-2"></i>
                                Activities: Hiking, Cycling
                            </li>
                        </ul>

                        <p>On your arrival at Tribhuvan International Airport in Kathmandu, you will be met by our
                            representative
                            and
                            transferred to your hotel.</p>

                        <p>Your hotel is in the city's center, the vibrant and colorful area known as Thamel. With its
                            restaurants,
                            bars, and shops with unique Nepali handcrafted items and trekking gear, this is an interesting
                            place to
                            spend the afternoon.</p>

                        <p>There will be the opportunity to meet your guide today and ask any questions you may still have
                            about
                            your
                            trip to Everest Base Camp.</p>
                    </div>
                @endfor

                <h2 class="mb-4">EVEREST BASE CAMP ALTITUDE CHART</h2>
                <img src="{{ asset('images/chart.jpg') }}" alt="chart" class="w-100 mb-5">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>DEPARTURE DATES</h2>
                    <form>
                        <select class="form-select" id="monthSelect">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
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
                            @for ($i = 0; $i < 5; $i++)
                                <tr>
                                    <th scope="row">9th Nov</th>
                                    <td class="fw-bold">
                                        24th Nov
                                    </td>
                                    <td>
                                        3 People Joined
                                    </td>
                                    <td>
                                        <div class="fw-bold mb-1">$ 4500</div>
                                        <div class="small text-muted">
                                            <a href="#" class="btn btn-primary">Join us <i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <h2 class="mb-4">FAQ</h2>
                <div class="accordion accordion-flush mx-auto mb-5" id="faqAccordion" style="max-width: 996px">
                    <div class="accordion-item brand-shadow mb-4 p-3">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                                What is the best time to trek in Nepal?
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The best seasons for trekking in Nepal are Spring (March-May) and Autumn
                                (September-November) when
                                the weather is clear and temperatures are moderate.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item brand-shadow mb-4 p-3">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                Do I need a guide for trekking?
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                While not always mandatory, having a guide is highly recommended for safety, navigation, and
                                cultural insights. Some routes require mandatory guides.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item brand-shadow mb-4 p-3">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                What permits do I need for trekking?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Required permits vary by region. Most treks need TIMS card and specific area permits. Our
                                team will
                                handle all necessary permit arrangements.
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="mb-4">REVIEWS</h2>
                <div id="testimonials" class="splide mb-5" aria-label="Testimonial">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @for ($i = 0; $i < 10; $i++)
                                <li class="splide__slide">
                                    <x-testimonial-card />
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>

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

                <div class="bg-primary text-white p-3 mb-3">
                    <div class="d-flex justify-content-center gap-2 align-items-center">
                        <div>
                            <div class="fw-bold">All Inclusive cost</div>
                            <div class="fw-bold">USD <span class="fs-4">1200</span> per person</div>
                        </div>
                        <img src="{{ asset('images/sale.png') }}" alt="sale" width="120" height="120">
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
                                    <div class="fw-bold">$1300/per</div>
                                    <small class="text-muted">Partial Pay</small>
                                </td>
                                <td class="text-center">
                                    <div class="fw-bold">$1250/per</div>
                                    <small class="text-muted">Partial Pay</small>
                                </td>
                                <td class="text-center">
                                    <div class="fw-bold">$1200/per</div>
                                    <small class="text-muted">Partial Pay</small>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button class="btn bg-white text-primary w-100">BOOK NOW</button>
                </div>

                <form class="bg-primary text-white p-3 mb-3">
                    <div class="fw-bold mb-4">Send us your queries or requests</div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="fullName" placeholder="Enter Full Name"
                            required>
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Enter Email Address"
                            required>
                    </div>

                    <div class="mb-3">
                        <input type="tel" class="form-control" id="phone" placeholder="Enter Phone Number"
                            required>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" id="message" rows="4" placeholder="Enter Your Message" required></textarea>
                    </div>

                    <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="your-recaptcha-site-key"></div>
                    </div>

                    <div class="mb-3 small fw-light">
                        Your information will never be shared with anyone outside our company
                    </div>

                    <button type="submit" class="btn bg-white text-primary w-100">Enquire Now</button>
                </form>

                <div class="bg-primary text-white p-3 mb-3">
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
                        <img src="{{ asset('images/pay_visa.png') }}" alt="ammex" width="60">
                        <img src="{{ asset('images/pay_mastercard.png') }}" alt="ammex" width="60">
                        <img src="{{ asset('images/pay_unionpay.png') }}" alt="ammex" width="60">
                        <img src="{{ asset('images/pay_ammex.png') }}" alt="ammex" width="60">
                    </div>

                </div>

                <div class="bg-primary text-white p-3 mb-3">
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
                        <li class="list-group-item bg-primary text-white">
                            Speak to one of our travel consultants
                        </li>
                        <li class="list-group-item bg-primary text-white">
                            <i class="fas fa-phone me-2"></i>
                            Call Us (24/7) : +977- 12345678
                        </li>
                        <li class="list-group-item bg-primary text-white">
                            <i class="fab fa-whatsapp me-2"></i>
                            WhatsApp (24/7) : +977- 12345678
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include('inc.book-a-call-cta')
@endsection

@push('scripts')
    <script>
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
