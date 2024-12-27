@extends('layouts.website')

@section('title', 'Who We Are')

@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="Learn about Hiking Nepal - your trusted partner for tailored Himalayan adventures. We deliver world-class adventure holidays with competitive pricing and experienced guides.">
    <meta name="keywords"
        content="hiking nepal about, nepal trekking company, himalayan adventures, experienced guides nepal, adventure tourism nepal, nepal tour operator">
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="Who We Are - Hiking Nepal">
    <meta property="og:description"
        content="Learn about Hiking Nepal - your trusted partner for tailored Himalayan adventures. We deliver world-class adventure holidays with competitive pricing and experienced guides.">
    <meta property="og:image" content="{{ asset('images/who-we-are-cover.webp') }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Who We Are - Hiking Nepal">
    <meta name="twitter:description"
        content="Learn about Hiking Nepal - your trusted partner for tailored Himalayan adventures. We deliver world-class adventure holidays with competitive pricing and experienced guides.">
    <meta name="twitter:image" content="{{ asset('images/who-we-are-cover.webp') }}">
@endsection

@section('content')
    <section class="position-relative overflow-hidden d-flex justify-content-center align-items-center"
        style="height: 530px;">
        <img src="{{ asset('images/who-we-are-cover.webp') }}" alt="head cover"
            class="w-100 position-absolute start-0 top-0"
            style="height: 530px; object-fit:cover; filter: brightness(80%) contrast(110%);">
        <div class="container">
            <h1 class="mb-0 z-1 position-relative text-uppercase text-white text-center">WHO WE ARE</h1>
        </div>
    </section>

    <section class="bg-light py-0 py-md-5">
        <div class="container py-5 my-5 section-bg-container">
            <img src="{{ asset('images/cover-img-1.webp') }}" alt="cover image" class="section-bg-img end-0">

            <div class="row z-1">
                <div class="col-md-8">
                    <div class="brand-shadow text-center px-3 py-5 px-md-5 bg-white">
                        <div class="head-lines">
                            <div class="head-line-bg"></div>
                            <h2 class="mb-5 bg-white head-line-head">TAILORED HIMALAYAN ADVENTURES</h2>
                        </div>

                        <p>Embarking on the journey of exploration amidst the myriad tour and trek operators
                            in Nepal, Hiking Nepal entered the vibrant landscape of the Nepalese Tourism Industry with a
                            singular mission – to deliver world-class adventure holidays encompassing the diverse facets of
                            Nepal, all while maintaining a highly competitive pricing strategy. Over the years, our team,
                            forged through a crucible of experience, recognized the imperative need for a tour operator
                            capable of tailoring experiences to the preferences and financial considerations of every type
                            of traveler. Our aim is to ensure that no one misses the breathtaking highlights of adventure
                            tourism in the majestic Himalayas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-0 py-md-5 my-5">
        <div class="container py-5 section-bg-container justify-content-center overflow-hidden">

            <img src="{{ asset('images/cover-img-2.webp') }}" alt="cover image" class="section-bg-img start-0">

            <div class="row z-1 w-100">
                <div class="col-md-8 offset-md-4">
                    <div class="brand-shadow text-center px-3 py-5 px-md-5 bg-white w-100">
                        <div class="head-lines mb-5">
                            <div class="head-line-bg"></div>
                            <h2 class="mb-3 bg-white head-line-head">Expertly Crafted Journeys</h2>
                        </div>

                        <p>The architects of our meticulously crafted products are seasoned guides, individuals who have
                            intimately known the regions for decades. Our operational philosophy centers around creating
                            a win-win scenario for all stakeholders, encompassing local communities, the environment,
                            guides, the nation, and our company. Despite being relatively new players in the industry,
                            we have harnessed a profound understanding of the intricacies involved in orchestrating
                            tours and treks across Nepal, India, Bhutan, and Tibet. While we may be new to company
                            ownership, our wealth of knowledge encompasses both sides of the coin, distinguishing us in
                            our ability to navigate the complexities of the adventure tourism realm.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-0 py-md-5 my-5">
        <div class="container py-5 section-bg-container justify-content-center overflow-hidden">

            <img src="{{ asset('images/cover-img-2.webp') }}" alt="cover image" class="section-bg-img end-0">

            <div class="row z-1 w-100">
                <div class="col-md-8">
                    <div class="brand-shadow text-center px-3 py-5 px-md-5 bg-white w-100">
                        <div class="head-lines mb-5">
                            <div class="head-line-bg"></div>
                            <h2 class="mb-3 bg-white head-line-head">Our Achievement In Number</h2>
                            <p>Join countless happy trekkers on breathtaking eco-friendly adventures!</p>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-3 col-6 text-center">
                                <img src="{{ asset('images/templ.gif') }}" class="mb-2" alt="temple" width="80"
                                    height="80" loading="lazy">
                                <div class="fs-3 fw-bold text-success counter" data-count="354">0</div>
                                <div>Destination</div>
                            </div>
                            <div class="col-md-3 col-6 text-center">
                                <img src="{{ asset('images/plane.gif') }}" class="mb-2" alt="plane" width="80"
                                    height="80" loading="lazy">
                                <div class="fs-3 fw-bold text-success counter" data-count="1250">0</div>
                                <div>Tour</div>
                            </div>
                            <div class="col-md-3 col-6 text-center">
                                <img src="{{ asset('images/earth.gif') }}" class="mb-2" alt="globe" width="60"
                                    loading="lazy">
                                <div class="fs-3 fw-bold text-success counter" data-count="25">0</div>
                                <div>Country</div>
                            </div>
                            <div class="col-md-3 col-6 text-center">
                                <img src="{{ asset('images/tourist.gif') }}" class="mb-2" alt="tourist" width="80"
                                    height="80" loading="lazy">
                                <div class="fs-3 fw-bold text-success counter" data-count="4600">0</div>
                                <div>Tourists</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('inc.testimonial')
    @include('inc.discover')

    @include('inc.book-a-call-cta')
    @include('inc.insta')
@endsection

@push('scripts')
    <script>
        var testimonials = new Splide('#testimonials', {
            type: 'loop',
            perPage: 3,
            perMove: 1,
            gap: '2rem',
            pagination: false,
            breakpoints: {
                1024: {
                    perPage: 2,
                },
                768: {
                    perPage: 2,
                },
                767: {
                    perPage: 1,
                }
            }
        });
        testimonials.mount();

        // Counter animation when element is in viewport
        const counterAnimation = () => {
            const counters = document.querySelectorAll('.counter');
            const speed = 500; // Animation speed

            const startCount = (el) => {
                const target = parseInt(el.getAttribute('data-count'));
                let count = 0;
                const inc = target / speed;

                const updateCount = () => {
                    if (count < target) {
                        count = Math.ceil(count + inc);
                        el.innerText = count;
                        setTimeout(updateCount, 1);
                    } else {
                        el.innerText = target;
                    }
                }
                updateCount();
            }

            // Observer for triggering animation when in viewport
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        startCount(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            });

            counters.forEach(counter => observer.observe(counter));
        }

        document.addEventListener('DOMContentLoaded', counterAnimation);
    </script>
@endpush
