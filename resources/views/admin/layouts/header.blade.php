 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->


<!-- Pending Order -->
    {{-- <li class="nav-item dropdown">
   
      <a class="nav-link" data-toggle="dropdown" href="#" title="Pending order">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"> New order</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          22333
          <span class="float-right text-muted text-sm">ee/Qty</span>
        </a>
        
       
        <div class="dropdown-divider"></div>
        <a href="" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
         <!-- Profile Dropdown Menu -->
         <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="{{ route('admin.profile') }}" class="dropdown-item">
              <i class="fas fa-user-circle mr-2"></i> Profile
            </a>
            <div class="dropdown-divider"></div>

            <a href="{{ route('admin.password') }}" class="dropdown-item">
              <i class="fas fa-lock mr-2"></i> Change password
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
          
          </div>
        </li>
  </ul>
</nav>
<!-- /.navbar -->
