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
    @include('home.inc.blog')
    @include('home.inc.insta')


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
