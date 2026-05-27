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
    <x-yt-header title="Our Team" />

    <section class="container my-5 text-center">
        <h2 class="mb-5">HIKING NEPAL TEAM</h2>
        <p>Hiking Nepal isn't just a company, it's a collective of passionate explorers, dedicated professionals, and cultural storytellers. From Himalayan summits to quiet teahouses, every journey we offer is made possible by this incredible team. Get to know the people who make your dream trek a reality.</p>
    </section>
@foreach ($teams as $team)

    @if ($loop->odd)
         <section class="bg-light py-0 py-md-5">
        <div class="container py-5 my-5 section-bg-container">
            @if($team->photo_url)
            <img src="{{ $team->photo_url }}" alt="{{ $team->name }}" class="section-bg-img end-0 d-none d-md-block" style="max-width: 500px">
            @endif

            <div class="row z-1">
                <div class="col-md-8">
                    <div class="brand-shadow px-3 py-5 px-md-5 bg-white">
                        @if($team->photo_url)
                        <img src="{{ $team->photo_url }}" alt="{{ $team->name }}" class="d-block d-md-none img-fluid">
                        @endif
                        <div class="text-muted mt-4 mt-md-0">{{ $team->position }}</div>
                        <h2 class="mb-5">{{ $team->name }}</h2>

                        <p>
                            {{ $team->comment }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="my-5">
        <div class="container py-5 section-bg-container justify-content-center overflow-hidden">
            @if($team->photo_url)
            <img src="{{ $team->photo_url }}" alt="{{ $team->name }}" class="section-bg-img start-0 d-none d-md-block" style="max-width: 500px">
            @endif
            <div class="row z-1 w-100">
                <div class="col-md-8 offset-md-4">
                    <div class="brand-shadow px-3 py-5 px-md-5 bg-white w-100">
                        @if($team->photo_url)
                        <img src="{{ $team->photo_url }}" alt="{{ $team->name }}" class="d-block d-md-none img-fluid">
                        @endif
                        <div class="text-muted mt-4 mt-md-0">{{ $team->position }}</div>
                        <h2 class="mb-5">{{ $team->name }}</h2>

                        <p>
                            {{ $team->comment }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endforeach



    @include('inc.discover')
    {{--  --}}
@endsection
