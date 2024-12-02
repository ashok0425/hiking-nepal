<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Hiking Nepal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark py-0">
        <div class="d-block w-100">
            <div class="container d-flex align-items-center py-2">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('logo.png') }}" alt="hiking nepal logo" width="208" height="auto">
                </a>

                <div class="ms-auto d-flex align-items-center gap-4">
                    <a href="#" class="text-uppercase">Join Groups</a>
                    <a href="#" class="d-inline-flex align-items-center gap-1"><img
                            src="{{ asset('images/ic_outline-whatsapp.png') }}" alt="whatsapp" width="24"
                            height="24">
                        +977-9802342080</a>

                    <a href="{{ route('deals') }}" class="btn btn-primary">Deals</a>
                    <a href="{{ route('book-trip') }}" class="btn btn-primary">Pay Online</a>

                    <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>

            <div class="collapse navbar-collapse bg-primary w-100" id="navbarNav">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('home') ? 'active' : '' }}"
                                href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Nepal
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                India
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Bhutan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('information') ? 'active' : '' }}"
                                href="{{ route('information') }}">Information</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Route::is('who-we-are', 'what-we-offer', 'booking-terms', 'legal-document', 'our-team') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown">
                                About
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item {{ Route::is('who-we-are') ? 'active' : '' }}"
                                        href="{{ route('who-we-are') }}">Who We Are</a></li>
                                <li><a class="dropdown-item {{ Route::is('what-we-offer') ? 'active' : '' }}"
                                        href="{{ route('what-we-offer') }}">What We Offer</a></li>
                                <li><a class="dropdown-item {{ Route::is('booking-terms') ? 'active' : '' }}"
                                        href="{{ route('booking-terms') }}">Booking Terms</a></li>
                                <li><a class="dropdown-item {{ Route::is('legal-document') ? 'active' : '' }}"
                                        href="{{ route('legal-document') }}">Legal Document</a></li>
                                <li><a class="dropdown-item {{ Route::is('our-team') ? 'active' : '' }}"
                                        href="{{ route('our-team') }}">Our Team</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('blog') ? 'active' : '' }}"
                                href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('contact') ? 'active' : '' }}"
                                href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('deals') ? 'active' : '' }}"
                                href="{{ route('deals') }}">Deals</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
