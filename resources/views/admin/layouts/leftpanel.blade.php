  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Brand Logo -->
      <a href="{{ route('/') }}" class="brand-link">
          {{-- <img src="{{getImageurl($logo)}}" alt="Baratodeal Logo" class="" width="200"> --}}
          NepalVision
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
                          <i class="nav-icon fas fa-mountain"></i>
                          <p>
                              Manage Destinations
                              <i class="fas fa-angle-left right"></i>

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

                  <li class="nav-item <?php echo Request::segment(2) == 'categories-places' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'categories-places' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-road"></i>
                          <p>
                              Category Places
                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.categories-places.index') }}"
                                  class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View All</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.categories-places.create') }}"
                                  class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Region </p>
                              </a>
                          </li>

                      </ul>
                  </li>



                  {{-- Category Destination  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'categories-destinations' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'categories-destinations' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-bus"></i>
                          <p>
                              Travel Category
                              <i class="fas fa-angle-left right"></i>

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





                  {{-- Category Package  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'categories-packages' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'categories-packages' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-box"></i>
                          <p>
                              Manage Packages
                              <i class="fas fa-angle-left right"></i>

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

                      </ul>
                  </li>


                  {{-- Testimonial  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'testimonials' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'testimonials' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-star"></i>
                          <p>
                              Testimonial Data
                              <i class="fas fa-angle-left right"></i>

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
                              <a href="{{ route('admin.testimonials.create') }}" class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Testimonial </p>
                              </a>
                          </li>

                      </ul>
                  </li>



                  {{-- Faq  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'faqs' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'faqs' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-tag"></i>
                          <p>
                              FAQ Data
                              <i class="fas fa-angle-left right"></i>

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




                  {{-- Departure Date  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'departures' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'departures' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-clock"></i>
                          <p>
                              Departure Date
                              <i class="fas fa-angle-left right"></i>

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







                  {{-- blog Date  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'blogs' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'blogs' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Blog Data <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.blogs.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View All</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.blogs.create') }}" class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add New </p>
                              </a>
                          </li>

                      </ul>
                  </li>



                  {{-- Event Date  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'events' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'events' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-clock"></i>
                          <p>
                              Event List <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.events.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View All</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.events.create') }}" class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add New </p>
                              </a>
                          </li>

                      </ul>
                  </li>




                  {{-- Newsletter  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'newsletters' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'newsletters' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Newsletter
                              <i class="fas fa-angle-left right"></i>

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
                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item ">
                              <a href="{{ route('admin.contact.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View All </p>
                              </a>
                          </li>

                          {{-- <li class="nav-item ">
      <a href="{{route('admin.contacts.history')}}" class="nav-link <?php echo Request::segment(3) == 'emailhistory' ? 'active' : ''; ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Email History </p>
      </a>
    </li> --}}



                      </ul>
                  </li>
                  {{-- Role permission  --}}
                  {{-- <li class="nav-item <?php echo Request::segment(2) == 'role_permission' ? 'menu-open' : ''; ?>">
  <a href="#" class="nav-link <?php echo Request::segment(2) == 'role_permission' ? 'active' : ''; ?> ">
    <i class="nav-icon fas fa-tag"></i>
    <p>
     Roles & Permission
      <i class="fas fa-angle-left right"></i>

    </p>
  </a>
  <ul class="nav nav-treeview">
    
    <li class="nav-item ">
      <a href="{{route('admin.role')}}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>View All </p>
      </a>
    </li>

    <li class="nav-item ">
      <a href="{{route('admin.role.create')}}" class="nav-link <?php echo Request::segment(3) == 'emailhistory' ? 'active' : ''; ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Add New </p>
      </a>
    </li>
  </ul>
</li> --}}



                  {{-- Newsletter  --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'websites' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'websites' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-wrench"></i>
                          <p>
                              Setting
                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item ">
                              <a href="{{ route('admin.websites.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Website Setting </p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.section-control.index') }}"
                                  class="nav-link <?php echo Request::segment(3) == 'emailhistory' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Section Controls </p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.cms.index') }}" class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>CMS </p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.banners.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Banner </p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- dashboard section --}}
                  <li class="nav-item ">
                    <a href="{{ route('admin.country.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Country

                        </p>
                    </a>

                </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
