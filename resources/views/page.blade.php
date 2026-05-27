@extends('layouts.website')

@section('title', $page->meta_title ?: $page->title)

@section('meta')
    @if ($page->meta_description)
        <meta name="description" content="{{ $page->meta_description }}">
    @endif
    @if ($page->meta_keywords)
        <meta name="keywords" content="{{ $page->meta_keywords }}">
    @endif

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page->meta_title ?: $page->title }} - Hiking Nepal">
    @if ($page->meta_description)
        <meta property="og:description" content="{{ $page->meta_description }}">
    @endif
    <meta property="og:image" content="{{ asset('images/head-cover.webp') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $page->meta_title ?: $page->title }} - Hiking Nepal">
    @if ($page->meta_description)
        <meta name="twitter:description" content="{{ $page->meta_description }}">
    @endif
    <meta name="twitter:image" content="{{ asset('images/head-cover.webp') }}">
@endsection

@section('content')
    <x-yt-header title="{{ $page->title }}" />

    <section class="container py-md-5 my-5">
        <div class="page-content">
            {!! $page->content !!}
        </div>
    </section>
@endsection
