@extends('layouts.website')

@section('title', 'Our Team')

@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="Meet the passionate and experienced team behind Hiking Nepal. Our dedicated professionals, from expert guides to support staff, work together to provide unforgettable trekking experiences in the Himalayas.">
    <meta name="keywords"
        content="hiking nepal team, nepal trekking guides, himalayan trek guides, professional trekking team nepal, experienced mountain guides nepal">
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="Our Team - Hiking Nepal">
    <meta property="og:description"
        content="Meet the passionate and experienced team behind Hiking Nepal. Our dedicated professionals, from expert guides to support staff, work together to provide unforgettable trekking experiences in the Himalayas.">
    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Our Team - Hiking Nepal">
    <meta name="twitter:description"
        content="Meet the passionate and experienced team behind Hiking Nepal. Our dedicated professionals, from expert guides to support staff, work together to provide unforgettable trekking experiences in the Himalayas.">
@endsection

@section('content')
    <section class="position-relative overflow-hidden d-flex justify-content-center align-items-center"
        style="height: 530px;">
        <img src="{{ asset('images/head-cover.webp') }}" alt="head cover" class="w-100 position-absolute start-0 top-0"
            style="height: 530px; object-fit:cover; filter: brightness(80%) contrast(110%);">
        <div class="container">
            <h1 class="mb-0 z-1 position-relative text-uppercase text-white text-center">OUR TEAM</h1>
        </div>
    </section>

    <section class="container py-5 my-5 text-center">
        <h2 class="mb-5">HIKING NEPAL TEAM</h2>
        <p>At Hiking Nepal, our team is made up of passionate, experienced, and dedicated professionals who are committed to
            providing unforgettable trekking experiences in the Himalayas. From seasoned guides with extensive knowledge of
            Nepal's trekking routes to support staff who ensure your journey is smooth and comfortable, we work together to
            make every adventure a safe and memorable one. Our team's deep love for the mountains, combined with their
            expertise, ensures that you not only explore the breathtaking landscapes of Nepal but also immerse yourself in
            its rich culture and heritage.</p>
    </section>

    <section class="bg-light py-0 py-md-5">
        <div class="container py-5 my-5 section-bg-container">
            <img src="{{ asset('images/cover-img-1.webp') }}" alt="cover image" class="section-bg-img end-0">

            <div class="row z-1">
                <div class="col-md-8">
                    <div class="brand-shadow px-3 py-5 px-md-5 bg-white">
                        <div class="text-muted">FOUNDER AND CEO</div>
                        <h2 class="mb-5">SAM SMITH</h2>

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

    <section class="py-0 py-md-5 my-5">
        <div class="container py-5 section-bg-container justify-content-center overflow-hidden">

            <img src="{{ asset('images/cover-img-2.webp') }}" alt="cover image" class="section-bg-img start-0">

            <div class="row z-1 w-100">
                <div class="col-md-8 offset-md-4">
                    <div class="brand-shadow px-3 py-5 px-md-5 bg-white w-100">
                        <div class="text-muted">FOUNDER AND CEO</div>
                        <h2 class="mb-5">SAM SMITH</h2>

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

    <section class="bg-light py-0 py-md-5">
        <div class="container py-5 my-5 section-bg-container">
            <img src="{{ asset('images/cover-img-1.webp') }}" alt="cover image" class="section-bg-img end-0">

            <div class="row z-1">
                <div class="col-md-8">
                    <div class="brand-shadow px-3 py-5 px-md-5 bg-white">
                        <div class="text-muted">FOUNDER AND CEO</div>
                        <h2 class="mb-5">SAM SMITH</h2>

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

    <section class="py-0 py-md-5 my-5">
        <div class="container py-5 section-bg-container justify-content-center overflow-hidden">

            <img src="{{ asset('images/cover-img-2.webp') }}" alt="cover image" class="section-bg-img start-0">

            <div class="row z-1 w-100">
                <div class="col-md-8 offset-md-4">
                    <div class="brand-shadow px-3 py-5 px-md-5 bg-white w-100">
                        <div class="text-muted">FOUNDER AND CEO</div>
                        <h2 class="mb-5">SAM SMITH</h2>

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

    @include('inc.discover')
    @include('inc.book-a-call-cta')
@endsection
