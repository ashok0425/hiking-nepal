<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <a href="{{ route('admin.password') }}" class="dropdown-item">
                    <i class="fas fa-lock mr-2"></i> Change password
                </a>

                <div class="dropdown-divider"></div>

                <form action="{{ route('admin.logout') }}" method="POST" class="dropdown-item">
                    @csrf
                    <button type="submit" class="btn btn-link p-0" style="color: inherit; text-decoration: inherit;">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
