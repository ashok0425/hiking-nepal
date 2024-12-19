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
                      <a href="{{ route('admin.reviews.index') }}"
                          class="nav-link {{ Route::is('admin.reviews.*') ? 'active' : '' }} ">
                          <i class="nav-icon fas fa-star"></i>
                          <p>Reviews</p>
                      </a>
                  </li>

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
                                  <p>Posts</p>
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
