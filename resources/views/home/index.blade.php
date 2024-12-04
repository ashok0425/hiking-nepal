@extends('layouts.website')

@section('title', 'Hiking Nepal')

@section('content')
    @include('home.inc.hero')
    @include('home.inc.popular-destinations')
    @include('home.inc.why-us')
    @include('home.inc.achievement')
    @include('home.inc.popular-packages')
    @include('home.inc.discounted-packages')
    @include('home.inc.faq')
    @include('home.inc.departure')
    @include('home.inc.testimonial')


    <section class="bg-light py-5">
        <div class="container py-5 my-5">
            <h2 class="text-success">LATEST BLOG</h2>
            <div class="row mb-4">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col-md-4">
                        <x-blog-card />
                    </div>
                @endfor

            </div>

            <a href="#" class="btn btn-primary">More Details</a>
        </div>
    </section>

    <section class="container py-5 my-5">
        <h2 class="text-success">FOLLOW US ON INSTAGRAM</h2>

        <div class="row mb-4">
            @for ($i = 0; $i < 3; $i++)
                <div class="col-md-4">
                    <img src="{{ asset('images/insta.png') }}" class="w-100" />
                </div>
            @endfor

        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <h3 class="text-success">Discover destinations beyond your reach</h3>
                <p>Our journeys are guided by certified experts, offering you unique experiences in locations that remain
                    hidden to most.</p>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="text-success">Discover destinations beyond your reach</h3>
                <p>Our journeys are guided by certified experts, offering you unique experiences in locations that remain
                    hidden to most.</p>
            </div>
            <div class="col-md-4 text-center">
                <h3 class="text-success">Discover destinations beyond your reach</h3>
                <p>Our journeys are guided by certified experts, offering you unique experiences in locations that remain
                    hidden to most.</p>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
