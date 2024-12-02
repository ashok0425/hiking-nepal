@extends('layouts.website')

@section('title', 'Hiking Nepal')

@section('content')
    <section class="hero">
        <div class="container">
            <div class="hero-cloud-r1"></div>
            <h1 class="">Hiking Nepal</h1>
            <form action="" method="GET">
                <input class="form-control" type="text" placeholder="Find your trip..." required>
            </form>

            <img src="/images/mount-img-center-top.png" class="hero-mount-center-top" alt="">
            <img src="/images/mount-img-l1.png" class="hero-mount-l1" alt="">
            <img src="/images/mount-img-r1.png" class="hero-mount-r1" alt="">
            <img src="/images/mount-img-center.png" class="hero-mount-center" alt="">

            <div class="hero-cloud-l1"></div>
            <div class="hero-cloud-l2"></div>

            <div class="hero-cloud-center"></div>
        </div>
    </section>
@endsection
