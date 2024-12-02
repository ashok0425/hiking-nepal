<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Hiking Nepal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
        integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">

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

    <footer class="mt-5">
        <div class="footer-container py-5 ">
            <div class="container" style="padding-top: 200px;">
                <div class="row">
                    <!-- Column 1: Contact Info -->
                    <div class="col-md-3">
                        <img src="{{ asset('images/logo-2.png') }}" alt="Hiking Nepal Logo" width="51"
                            height="51" class="mb-3">
                        <h6 class="text-success mb-3">Let’s Explore Places</h6>
                        <ul class="list-unstyled">
                            <li><a href="#">Thamel Kathmandu</a></li>
                            <li><a href="mailto:support@domain.com">support@domain.com</a></li>
                            <li><a href="www.damiwebsite.com">www.damiwebsite.com</a></li>
                        </ul>
                    </div>

                    <!-- Column 2: Quick Links -->
                    <div class="col-md-3">
                        <h6 class="text-success mb-3">QUICK LINKS</h6>
                        <ul class="list-unstyled">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Trekking</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Our Team</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Column 3: Useful Links -->
                    <div class="col-md-3">
                        <h6 class="text-success mb-3">USEFUL LINKS</h6>
                        <ul class="list-unstyled">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms and Conditions</a>
                            </li>
                            <li><a href="#">Disclaimer</a></li>
                            <li><a href="#">Elements</a></li>
                            <li><a href="#">Support</a></li>
                        </ul>
                    </div>

                    <!-- Column 4: Newsletter -->
                    <div class="col-md-3">
                        <h6 class="text-success mb-3">NEWSLETTER</h6>
                        <p class="small">Sign up for Deals and Discount. Get News, Notifications and Updates
                            about the recent Events and Offers.
                        </p>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email Address">
                            <button class="btn btn-primary" type="button">SUBSCRIBE</button>
                        </div>
                        <!-- Payment Icons -->
                        <div class="payment-icons mt-3">
                            <img src="path-to-mastercard-icon.png" alt="Mastercard" class="me-2"
                                style="height: 20px;">
                            <img src="path-to-visa-icon.png" alt="Visa" class="me-2" style="height: 20px;">
                            <img src="path-to-paypal-icon.png" alt="PayPal" class="me-2" style="height: 20px;">
                        </div>
                        <!-- Social Media Icons -->
                        <div class="social-icons mt-3">
                            <a href="#" class="text-secondary me-2"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-secondary me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-secondary me-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-secondary me-2"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="text-secondary me-2"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="row mt-4">
                    <div class="col-12">
                        <p class="text-secondary small mb-0">
                            Copyright © 2023. All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"
        integrity="sha256-FZsW7H2V5X9TGinSjjwYJ419Xka27I8XPDmWryGlWtw=" crossorigin="anonymous"></script>
</body>

</html>
