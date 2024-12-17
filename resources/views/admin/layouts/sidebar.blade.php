  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-2">

      <!-- Brand Logo -->
      <a href="{{ route('admin.dashboard') }}" class="brand-link">
          <img src="{{ asset('logo-white.png') }}" alt="Hiking Nepal Logo" class="" width="200">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
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

                  <li class="nav-item <?php echo Request::segment(2) == 'categories-packages' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'categories-packages' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-route"></i>
                          <p>
                              Tours
                              <i class="fas fa-angle-down right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.categories-packages.index') }}"
                                  class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  {{-- <i class="fas fa-list nav-icon"></i> --}}
                                  <p>Packages</p>
                              </a>
                          </li>

                          {{-- Tour Category  --}}
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  {{-- <i class="nav-icon fas fa-hiking"></i> --}}
                                  <p>Categories</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  {{-- Departure Date  --}}
                  {{-- <li class="nav-item">
                      <a href="{{ route('admin.departures.index') }}"
                          class="nav-link {{ Request::segment(2) == 'departures' ? 'active' : '' }} ">
                          <i class="nav-icon fas fa-plane-departure"></i>
                          <p>Departure Dates</p>
                      </a>
                  </li> --}}

                  <li class="nav-item">
                      <a href="{{ route('admin.testimonials.index') }}"
                          class="nav-link {{ Request::segment(2) == 'testimonials' ? 'active' : '' }} ">
                          <i class="nav-icon fas fa-star"></i>
                          <p>Reviews</p>
                      </a>
                  </li>

                  {{-- Blog --}}
                  <li class="nav-item">
                      <a href="{{ route('admin.posts.index') }}"
                          class="nav-link {{ Route::is('admin.posts.*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-quote-left"></i>
                          <p>Blog</p>
                      </a>
                  </li>

                  {{-- Newsletter  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'newsletters' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'newsletters' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-newspaper"></i>
                          <p>
                              Newsletter
                              <i class="fas fa-angle-down right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item ">
                              <a href="{{ route('admin.newsletters.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                                  <p>Subscribers</p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.newsletter.history') }}" class="nav-link <?php echo Request::segment(3) == 'emailhistory' ? 'active' : ''; ?>">
                                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                                  <p>Email History </p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- Contact  --}}
                  {{-- <li class="nav-item <?php echo Request::segment(2) == 'contacts' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'contacts' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              User Contact List
                              <i class="fas fa-angle-down right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item ">
                              <a href="{{ route('admin.contact.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View All </p>
                              </a>
                          </li>

                      </ul>
                  </li> --}}
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
