@extends('layouts.website')

@section('title', 'What We Offer')

@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="Discover what Hiking Nepal offers - personalized adventures, small group sizes, safety-first approach, flexible itineraries, and stress-free travel experiences in Nepal.">
    <meta name="keywords"
        content="hiking nepal services, nepal trekking company, adventure travel nepal, small group treks, customized trips nepal, safe trekking nepal">
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="What We Offer - Hiking Nepal">
    <meta property="og:description"
        content="Discover what Hiking Nepal offers - personalized adventures, small group sizes, safety-first approach, flexible itineraries, and stress-free travel experiences in Nepal.">
    <meta property="og:image" content="{{ asset('images/what-we-offer-cover.webp') }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="What We Offer - Hiking Nepal">
    <meta name="twitter:description"
        content="Discover what Hiking Nepal offers - personalized adventures, small group sizes, safety-first approach, flexible itineraries, and stress-free travel experiences in Nepal.">
    <meta name="twitter:image" content="{{ asset('images/what-we-offer-cover.webp') }}">
@endsection

@section('content')
    <x-yt-header title="What We Offer" />

    <section class="container my-5">
        <h2 class="text-center mb-5 mx-auto" style="max-width: 960px;">More Than Just a Trip : Creating Meaningful
            Adventures with Hiking Nepal
        </h2>
        <div class="row g-5">
            <div class="col-md-6">
                <p class="mb-0">Traveling the world has become more accessible than ever before, and Nepal is no
                    exception. With an
                    overwhelming number of registered tour operators, each offering similar services for adventure holidays,
                    it can be a challenging task to choose the right company for your trip. While many companies may promise
                    exceptional experiences, we at Hiking Nepal Travel never claim to be the best; instead, we focus on
                    consistently going the extra mile to ensure that we exceed your expectations. We prioritize quality
                    service, safety, and security above all else, understanding that these are the key factors that make or
                    break a travel experience. Our commitment to these principles sets us apart from others in the industry.
                    Our goal is not just to offer a standard adventure holiday, but to provide you with a journey that feels
                    personal, secure, and above all, unforgettable. We are here to ensure your trip is smooth, enjoyable,
                    and tailored to your individual needs, all while providing a level of service that reflects our
                    dedication to excellence.</p>
            </div>
            <div class="col-md-6">
                We are here for travelers who are looking for more than just the typical offerings of flights,
                accommodation, and a seat on a bus. At Hiking Nepal Travel, we strive to make your journey truly meaningful
                by focusing on the smaller details that often get overlooked. We take a local approach to every trip,
                thinking about the unique benefits we can provide to enhance your experience. Our goal is to ensure that
                your adventure isn’t just another holiday, but a transformative and memorable moment in your life. Whether
                it's connecting with local cultures, supporting communities, or offering experiences off the beaten path, we
                aim to create a trip that resonates long after you’ve returned home.
            </div>
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
                            <h2 class="mb-5 bg-white head-line-head">SAFTEY AND SECURITY</h2>
                        </div>

                        <p>Our first priority is your safety meantime, never let to compromise in regards to health. Hence,
                            we use our professional guides that are trained in terms of technical proficiency, proven safety
                            records, perfect judgment, friendly behavior and their ability to provide helpful and
                            knowledgeable instructions especially regarding AMS (Altitude Mountain Sickness). Likewise,
                            Camping in right and safe site is one of the technical concepts analyzed by the Local guide
                            trained as High altitude Sherpas. Our Sherpas makes sure to camp in right site during climbing
                            and serve hygienic and adequate meals during the trails. For trekking in the Himalayas of Nepal,
                            it is not obvious that every trekker is an experienced one. Hence, we have designed our
                            itinerary that let you familiarize and acclimatized with the altitude.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container py-5 section-bg-container justify-content-center overflow-hidden">

            <img src="{{ asset('images/cover-img-2.webp') }}" alt="cover image" class="section-bg-img start-0">

            <div class="row z-1 w-100">
                <div class="col-md-8 offset-md-4">
                    <div class="brand-shadow text-center px-3 py-5 px-md-5 bg-white w-100">
                        <div class="head-lines mb-5">
                            <div class="head-line-bg"></div>
                            <h2 class="mb-3 bg-white head-line-head">Intimate, Flexible Groups</h2>
                        </div>

                        <p>TFor us, delivering the best quality service starts with keeping our group sizes small and
                            manageable. We believe that a more intimate group allows for a more personalized experience,
                            ensuring that every traveler receives the attention and care they deserve. Our group sizes
                            typically range from a minimum of 1 person to a maximum of 10, but we are also happy to organize
                            trips for larger student groups or private groups of more than 10 participants. If you are an
                            individual traveler, you can simply sign up for one of our fixed departure dates that fit your
                            schedule. Whether you're traveling solo or with a group, we ensure that every trip is tailored
                            to offer the best experience possible.</p>
                    </div>
                </div>
            </div>
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
                            <h2 class="mb-5 bg-white head-line-head">STRESS-FREE ADVENTURE </h2>
                        </div>

                        <p>Once you arrive in Kathmandu, you’ll instantly become a part of our Hiking Nepal family. From
                            that moment on, we are dedicated to being by your side, ensuring that you have everything you
                            need for a smooth and enjoyable journey. We act as your personal guide and bodyguard, overseeing
                            every detail to make sure everything is on the right track. Our services extend from the moment
                            you land in Kathmandu until your departure, including airport transfers, transportation,
                            comfortable accommodations, necessary permits, entry fees, and any other support you might
                            require throughout your trip. No matter what you need, we are here to take care of everything,
                            so you can focus solely on enjoying the adventure.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container py-5 section-bg-container justify-content-center overflow-hidden">

            <img src="{{ asset('images/cover-img-2.webp') }}" alt="cover image" class="section-bg-img start-0">

            <div class="row z-1 w-100">
                <div class="col-md-8 offset-md-4">
                    <div class="brand-shadow text-center px-3 py-5 px-md-5 bg-white w-100">
                        <div class="head-lines mb-5">
                            <div class="head-line-bg"></div>
                            <h2 class="mb-3 bg-white head-line-head">SCHEDULED & CUSTOM DATES</h2>
                        </div>

                        <p>We offer two types of trip options: Published Fixed Departures and Private Tours, designed to
                            accommodate different preferences and schedules. If you’re flexible with your travel dates, you
                            can join one of our published fixed departure trips. These group trips bring together travelers
                            from various cultural backgrounds and nationalities, providing a rich, diverse experience.
                            Alternatively, if you’re traveling with a group or prefer a more personalized experience, we can
                            organize a private trip tailored to your specific needs and dates. We don’t require travelers to
                            join our fixed departures, giving you the flexibility to choose dates that work best for you.
                            Rest assured, all our published trips are guaranteed to run, and once you confirm your booking,
                            we will never cancel your trip unless you request otherwise. Your adventure is secure with us,
                            and we’re committed to ensuring it goes ahead as planned.</p>
                    </div>
                </div>
            </div>
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
                            <h2 class="mb-5 bg-white head-line-head">Customizable itinerary options</h2>
                        </div>

                        <p>Our website itineraries provide a standard outline that serves as a general guideline for your
                            trip, giving you an idea of what to expect. However, these itineraries are by no means set in
                            stone. We understand that every traveler has unique preferences, so you are welcome to suggest
                            any destinations or activities you’d like to include, as well as the type of accommodation you
                            prefer. Whether you're looking for a more relaxed pace, off-the-beaten-path locations, or
                            specific accommodations, we are always happy to customize your itinerary to better suit your
                            needs and ensure that your trip is designed exactly the way you envision it.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container py-5 section-bg-container justify-content-center overflow-hidden">

            <img src="{{ asset('images/cover-img-2.webp') }}" alt="cover image" class="section-bg-img start-0">

            <div class="row z-1 w-100">
                <div class="col-md-8 offset-md-4">
                    <div class="brand-shadow text-center px-3 py-5 px-md-5 bg-white w-100">
                        <div class="head-lines mb-5">
                            <div class="head-line-bg"></div>
                            <h2 class="mb-3 bg-white head-line-head">FLEXIBLE PAYMENT SECURITY</h2>
                        </div>

                        <p>Once you finalize your trip and the price, we offer flexible payment options to suit your
                            preferences. You can choose to pay either via bank transfer or credit card for your convenience.
                            To secure your booking, a 20% confirmation deposit is required, with the remaining balance due
                            upon your arrival in Kathmandu. In the event that you need to postpone your trip to a later date
                            or make changes to your itinerary—such as switching to a trip of similar category—we’ll ensure
                            your deposit is securely transferred and applied accordingly. This flexibility allows you to
                            plan with peace of mind, knowing that your funds are protected, and your travel plans can be
                            adjusted as needed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('inc.discover')

    @include('inc.book-a-call-cta')
@endsection
