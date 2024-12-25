@extends('layouts.website')

@section('title', 'Welcome')

@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="Discover the beauty of Nepal with our amazing hiking and trekking packages. Experience breathtaking mountain views, cultural heritage sites and unforgettable adventures.">
    <meta name="keywords" content="hiking nepal, trekking nepal, nepal tours, mountain hiking, adventure travel nepal">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="Welcome - Hiking Nepal">
    <meta property="og:description"
        content="Discover the beauty of Nepal with our amazing hiking and trekking packages. Experience breathtaking mountain views, cultural heritage sites and unforgettable adventures.">
    <meta property="og:image" content="https://hikingnepal.com/wp-content/uploads/2022/11/himalayas-3989411.jpg">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Welcome - Hiking Nepal">
    <meta name="twitter:description"
        content="Discover the beauty of Nepal with our amazing hiking and trekking packages. Experience breathtaking mountain views, cultural heritage sites and unforgettable adventures.">
    <meta name="twitter:image" content="https://hikingnepal.com/wp-content/uploads/2022/11/himalayas-3989411.jpg">
@endsection

@section('content')
    @include('home.inc.hero')
    @include('home.inc.popular-destinations')
    @include('home.inc.popular-packages')
    @include('home.inc.departure')
    @include('home.inc.discounted-packages')
    @include('home.inc.achievement')
    @include('home.inc.why-us')
    @include('inc.testimonial')
    @include('inc.faq')
    @include('home.inc.blog')
    @include('inc.insta')
    @include('inc.discover')
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
