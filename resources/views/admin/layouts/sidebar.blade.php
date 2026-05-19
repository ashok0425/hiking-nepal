<aside class="main-sidebar sidebar-dark-primary elevation-2">

    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('logo-white.png') }}" alt="Hiking Nepal Logo" width="200">
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item ">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.destinations.index') }}"
                        class="nav-link {{ Route::is('admin.destinations.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-map"></i>
                        <p>Destinations</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.places.index') }}"
                        class="nav-link {{ Route::is('admin.places.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-mountain"></i>
                        <p>Places</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.activities.index') }}"
                        class="nav-link {{ Route::is('admin.activities.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hiking"></i>
                        <p>Activities</p>
                    </a>
                </li>

                <li
                    class="nav-item {{ Route::is('admin.package-categories.*') || Route::is('admin.packages.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('admin.package-categories.*') || Route::is('admin.packages.*') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-route"></i>
                        <p>
                            Tours
                            <i class="fas fa-angle-down right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.packages.index') }}"
                                class="nav-link {{ Route::is('admin.packages.*') ? 'active' : '' }}">
                                <p>Packages</p>
                            </a>
                        </li>

                        {{-- Package Category  --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.package-categories.index') }}"
                                class="nav-link {{ Route::is('admin.package-categories.*') ? 'active' : '' }}">
                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.departures.index') }}"
                        class="nav-link {{ Route::is('admin.departures.*') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-plane-departure"></i>
                        <p>Departures</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.reviews.index') }}"
                        class="nav-link {{ Route::is('admin.reviews.*') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-star"></i>
                        <p>Reviews</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.team-members.index') }}"
                        class="nav-link {{ Route::is('admin.team-members.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Team Members</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.partner-logos.index') }}"
                        class="nav-link {{ Route::is('admin.partner-logos.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Partner Logos</p>
                    </a>
                </li>

                <li class="dropdown-divider"></li>

                <li class="nav-item">
                    <a href="{{ route('admin.scheduled-callbacks.index') }}"
                        class="nav-link {{ Route::is('admin.scheduled-callbacks.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-phone-alt"></i>
                        <p>Call Requests</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.bookings.index') }}"
                        class="nav-link {{ Route::is('admin.bookings.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Bookings</p>
                    </a>
                </li>

                <li class="dropdown-divider"></li>

                {{-- Blog --}}
                <li
                    class="nav-item {{ Route::is('admin.posts.*') || Route::is('admin.post-categories.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('admin.posts.*') || Route::is('admin.post-categories.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-quote-left"></i>
                        <p>
                            Blog
                            <i class="fas fa-angle-down right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.index') }}"
                                class="nav-link {{ Route::is('admin.posts.index') ? 'active' : '' }}">
                                <p>All Posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.post-categories.index') }}"
                                class="nav-link {{ Route::is('admin.post-categories.*') ? 'active' : '' }}">
                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Newsletter (rest of the code remains the same) --}}

                {{-- Newsletter  --}}
                <li
                    class="nav-item {{ Route::is('admin.newsletter-subscribers.*') || Route::is('admin.newsletter-posts.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('admin.newsletter-subscribers.*') || Route::is('admin.newsletter-posts.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Newsletter
                            <i class="fas fa-angle-down right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ route('admin.newsletter-posts.index') }}"
                                class="nav-link {{ Route::is('admin.newsletter-posts.*') ? 'active' : '' }}">
                                <p>All Posts</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ route('admin.newsletter-subscribers.index') }}"
                                class="nav-link {{ Route::is('admin.newsletter-subscribers.*') ? 'active' : '' }}">
                                <p>Subscribers</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.social-embeds.index') }}"
                        class="nav-link {{ Route::is('admin.social-embeds.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hashtag"></i>
                        <p>Social Embeds</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.home-faqs.edit', 'home_faqs') }}"
                        class="nav-link {{ Route::is('admin.home-faqs.*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-question-circle"></i>
                        <p>Home FAQ</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
