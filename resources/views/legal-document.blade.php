@extends('layouts.website')

@section('title', 'Legal Documents')

@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="View the legal documents and certifications of Hiking Nepal. Our company is fully authorized and follows all government rules and regulations for tourism operations in Nepal.">
    <meta name="keywords"
        content="hiking nepal legal documents, nepal trekking certifications, tourism company registration nepal, trekking company documents, authorized trekking company nepal">
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="Legal Documents - Hiking Nepal">
    <meta property="og:description"
        content="View the legal documents and certifications of Hiking Nepal. Our company is fully authorized and follows all government rules and regulations for tourism operations in Nepal.">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Legal Documents - Hiking Nepal">
    <meta name="twitter:description"
        content="View the legal documents and certifications of Hiking Nepal. Our company is fully authorized and follows all government rules and regulations for tourism operations in Nepal.">
@endsection

@section('content')
    <div class="py-5">
        <div class="container py-5 my-5">
            <h1 class="text-center mb-5">LEGAL DOCUMENTS</h1>

            <p class="mb-5">Hiking Nepal is established by the professional who have been working in the field of tourism
                for
                more than 15
                years and contributing their innovative ideas to groom up the tourism business in Nepal. The company
                sincerely
                follow the government rules and regulations as well as has cleared all the legal formalities for its
                establishment. The authorized documents of Hiking Nepal includes:</p>

            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <img src="{{ asset('images/docs-image-1.webp') }}" class="img-fluid" alt="doc image" />
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="{{ asset('images/docs-image-2.webp') }}" class="img-fluid" alt="doc image" />
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="{{ asset('images/docs-image-3.webp') }}" class="img-fluid" alt="doc image" />
                </div>
                <div class="col-lg-3 col-md-6">
                    <img src="{{ asset('images/docs-image-4.webp') }}" class="img-fluid" alt="doc image" />
                </div>
            </div>
        </div>
    </div>

    
@endsection
