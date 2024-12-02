@extends('layouts.website')

@section('title', 'Hiking Nepal')

@section('content')
    <section class="hero">
        <div class="container">
            <div class="hero-cloud-r1 animate__animated animate__slideInRight"></div>
            <h1 class="animate__animated animate__slideInUp">Hiking Nepal</h1>
            <form action="" method="GET" class="animate__animated animate__zoomIn">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <img src="{{ asset('images/search.png') }}" alt="search" width="18" height="18">
                    </span>
                    <input class="form-control ps-0" type="text" placeholder="Find your trip..." required>
                </div>
            </form>

            <img src="/images/mount-img-center-top.png" class="hero-mount-center-top animate__animated animate__slideInUp"
                alt="">
            <img src="/images/mount-img-l1.png" class="hero-mount-l1 animate__animated animate__slideInUp" alt="">
            <img src="/images/mount-img-r1.png" class="hero-mount-r1 animate__animated animate__slideInUp" alt="">
            <img src="/images/mount-img-center.png" class="hero-mount-center animate__animated animate__slideInUp"
                alt="">

            <div class="hero-cloud-l1 animate__animated animate__slideInLeft"></div>
            <div class="hero-cloud-l2 animate__animated animate__slideInLeft"></div>
            <div class="hero-cloud-center animate__animated animate__slideInRight"></div>
        </div>
    </section>

    <section class="container py-5 my-5">
        <h2 class="text-success">The best place you must visit</h2>
        <p class="mb-5">A wonderful serenity to have in ur bucket list</p>

        <div id="popularDestination" class="splide" aria-label="Popular destination">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide p-4">
                        <div class="shadow text-primary">
                            <h3>Popular destination</h3>
                            <p>A wonderful serenity has</p>
                        </div>
                    </li>
                    @for ($i = 0; $i < 10; $i++)
                        <li class="splide__slide">
                            <x-slide-one-card />
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container py-5 my-5">

            <div class="shadow p-3">
                <h2 class="text-success">WHY CHOOSE US ?</h2>
                <p>We believe that traveling and touring is much more than just a vacation but rather an opportunity to get
                    one
                <p>We believe that traveling and touring is much more than just a vacation but rather an opportunity to get
                    one
                    with
                    nature and enjoy the deeper aspect of its beauty. And, we work accordingly to provide our customers with
                    similar
                    experiences while on their treks and tours. On our treks and expeditions, we incorporate different types
                    of
                    experiences while on their treks and tours. On our treks and expeditions, we incorporate different types
                    of
                    experiences to enjoy nature, get to know the locals, and understand the culture while having fun. We
                    prioritize
                    blending in with the locals during the trek for cultural and linguistic experience, traditional
                    exposure,
                    blending in with the locals during the trek for cultural and linguistic experience, traditional
                    exposure,
                    and
                    understanding of the place.</p>

                <a href="#" class="btn btn-primary">Explore</a>
            </div>

        </div>
    </section>

    <section class="py-5 my-5">
        <div class="container py-5">

            <div class="shadow p-3">
                <h2 class="text-success">Our Achievement In Number</h2>
                <p>Join countless happy trekkers on breathtaking eco-friendly adventures!</p>

                <div class="row">
                    <div class="col-md-3">
                        <div>354</div>
                        <div>Destination</div>
                    </div>
                    <div class="col-md-3">
                        <div>354</div>
                        <div>Destination</div>
                    </div>
                    <div class="col-md-3">
                        <div>354</div>
                        <div>Destination</div>
                    </div>
                    <div class="col-md-3">
                        <div>354</div>
                        <div>Destination</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container py-5 my-5">
            <h2 class="text-success">Most Popular Packages</h2>

            <div id="popularPackages" class="splide" aria-label="Most Popular Packages">
                <div class="splide__track">
                    <ul class="splide__list">
                        @for ($i = 0; $i < 5; $i++)
                            <li class="splide__slide">
                                <x-package-card />
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var popularDestination = new Splide('#popularDestination', {
                type: 'loop',
                perMove: 1,
                autoWidth: true,
                gap: '1rem',
                pagination: false,
            });
            popularDestination.mount();

            var popularPackages = new Splide('#popularPackages', {
                type: 'loop',
                perPage: 3,
                perMove: 1,
                gap: '2rem',
                pagination: false,
                breakpoints: {
                    992: {
                        perPage: 2,
                    },
                    768: {
                        perPage: 1,
                    }
                }
            });
            popularPackages.mount();
        });
    </script>
@endsection
