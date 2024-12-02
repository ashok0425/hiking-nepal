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

        <div class="splide" aria-label="Popular destination">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide p-4">
                        <div class="shadow text-primary">
                            <h3>Popular destination</h3>
                            <p>A wonderful serenity has</p>
                        </div>
                        {{-- <x-slide-one-card /> --}}
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide', {
                type: 'loop',
                // perPage: 5,
                perMove: 1,
                autoWidth: true,
                gap: '1rem',
                pagination: false,
            });
            splide.mount();
        });
    </script>
@endsection
