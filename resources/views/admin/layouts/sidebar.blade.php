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

                  {{-- dashboard section --}}
                  <li class="nav-item ">
                      <a href="{{ route('admin.dashboard') }}" class="nav-link ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard

                          </p>
                      </a>

                  </li>

                  {{-- Destination  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'destinations' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'destinations' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-map"></i>
                          <p>
                              Destinations
                              <i class="fas fa-angle-down right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.destinations.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>All </p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.destinations.create') }}" class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Destination </p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <li class="nav-item <?php echo Request::segment(2) == 'places' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'places' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-mountain"></i>
                          <p>
                              Places
                              <i class="fas fa-angle-down right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.places.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View All</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.places.create') }}" class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Category Place</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- Category Destination  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'categories-destinations' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'categories-destinations' ? 'active' : ''; ?> ">
                          {{-- <i class="nav-icon fas fa-skiing"></i> --}}
                          <i class="nav-icon fas fa-hiking"></i>
                          <p>
                              Tour Categories
                              <i class="fas fa-angle-down right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.categories-destinations.index') }}"
                                  class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.categories-destinations.create') }}"
                                  class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Category </p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <li class="nav-item <?php echo Request::segment(2) == 'categories-packages' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'categories-packages' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-box"></i>
                          <p>
                              Tours
                              <i class="fas fa-angle-down right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.categories-packages.index') }}"
                                  class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Packages</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.categories-packages.create') }}"
                                  class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Packages </p>
                              </a>
                          </li>

                          {{-- Category Package  --}}
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon fas fa-tag"></i>
                                  <p>
                                      Categories

                                  </p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- Departure Date  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'departures' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'departures' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-plane-departure"></i>
                          <p>
                              Departure Dates
                              <i class="fas fa-angle-down right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.departures.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View All</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.departures.create') }}" class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add New </p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- Testimonial  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'testimonials' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'testimonials' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-star"></i>
                          <p>
                              Testimonials
                              <i class="fas fa-angle-down right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.testimonials.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Testimonials</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.testimonials.create') }}"
                                  class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Testimonial </p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- Faq  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'faqs' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'faqs' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-question-circle"></i>
                          <p>
                              FAQs
                              <i class="fas fa-angle-down right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.faqs.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View All</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.faqs.create') }}" class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add New </p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- Posts --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'posts' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'posts' ? 'active' : ''; ?> ">
                          {{-- <i class="nav-icon fas fa-newspaper"></i> --}}
                          <i class="nav-icon fas fa-quote-left"></i>
                          <p>
                              Blog
                              <i class="fas fa-angle-down right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.posts.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View All</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.posts.create') }}" class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add New</p>
                              </a>
                          </li>
                      </ul>
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
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View All </p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.newsletter.history') }}"
                                  class="nav-link <?php echo Request::segment(3) == 'emailhistory' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Email History </p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- Contact  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'contacts' ? 'menu-open' : ''; ?>">
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
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
