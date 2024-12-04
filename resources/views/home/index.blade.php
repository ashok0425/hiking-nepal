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
    @include('inc.testimonial')
    @include('home.inc.blog')
    @include('inc.insta')
    @include('inc.discover')
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
