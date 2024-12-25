<div id="mainNavbar" class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark py-0">
        <div class="d-block w-100">
            <div class="bg-white">
                <div class="container d-block d-lg-flex flex-row-reverse align-items-center py-2">
                    <div class="ms-auto d-flex flex-wrap align-items-center gap-3 gap-md-5">
                        <a href="https://api.whatsapp.com/send?phone=9779802342080" class="text-uppercase">Join Groups</a>
                        <a href="https://api.whatsapp.com/send?phone=9779802342080"
                            class="d-inline-flex align-items-center gap-1 text-dark"><img
                                src="{{ asset('images/ic_outline-whatsapp.png') }}" alt="whatsapp" width="24"
                                height="24">
                            +977-9802342080</a>

                        <div class="d-inline-flex gap-3 gap-md-5">
                            <a href="{{ route('deals') }}" class="btn btn-success blink-button">DEALS</a>
                            <a href="{{ route('book-trip') }}" class="btn btn-cta">Pay Online</a>
                        </div>
                    </div>

                    <div class="border-bottom w-100 mt-2 my-lg-0 d-lg-none"></div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('logo.png') }}" alt="hiking nepal logo" width="208" height="auto">
                        </a>

                        <button class="navbar-toggler text-white bg-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="border-bottom w-100 my-lg-0 d-lg-none"></div>
            </div>

            <div class="collapse navbar-collapse w-100" id="navbarNav">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('home') ? 'active' : '' }}"
                                href="{{ route('home') }}">Home</a>
                        </li>

                        @foreach ($destinations as $destination)
                            <li class="nav-item destination-dropdown dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown">
                                    {{ $destination['name'] }}
                                </a>
                                <ul class="dropdown-menu destination-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('dynamic-page', strtolower($destination['slug'])) }}">OVERVIEW</a>
                                    </li>

                                    @foreach ($destination['categories'] as $category)
                                        <li class="package-dropend">
                                            <a class="dropdown-item package-dropdown-toggle">
                                                {{ strtoupper($category['name']) }}
                                                <i class="fas fa-chevron-right float-end mt-1"></i>
                                            </a>
                                            <ul class="dropdown-menu package-submenu">
                                                @foreach ($category['packages'] as $package)
                                                    <li>
                                                        <a class="dropdown-item package-item"
                                                            href="{{ route('tours', $package['slug']) }}">
                                                            {{ $package['title'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach

                                    @foreach ($destination['activities'] as $activity)
                                        <li class="package-dropend">
                                            <a class="dropdown-item package-dropdown-toggle">
                                                {{ strtoupper($activity['name']) }}
                                                <i class="fas fa-chevron-right float-end mt-1"></i>
                                            </a>
                                            <ul class="dropdown-menu package-submenu">
                                                @foreach ($activity['packages'] as $package)
                                                    <li>
                                                        <a class="dropdown-item package-item"
                                                            href="{{ route('tours', $package['slug']) }}">
                                                            {{ $package['title'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('information') ? 'active' : '' }}"
                                href="{{ route('information') }}">Information</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Route::is('who-we-are', 'what-we-offer', 'booking-terms', 'legal-document', 'our-team') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown">
                                About
                            </a>
                            <ul class="dropdown-menu hover-menu">
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Contact
                            </a>
                            <ul class="dropdown-menu hover-menu">
                                <li><a class="dropdown-item" href="{{ route('book-a-call') }}">BOOK A
                                        CALL</a>
                                </li>
                            </ul>
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
</div>
