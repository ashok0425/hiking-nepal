<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="@yield('fev')" type="image/icon type">

    <title>@yield('title')</title>

    {{-- bootstrap --}}
    <link rel="preload stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        as="style">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">

    @stack('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- header  --}}
        @include('admin.layouts.header')

        {{-- sidebar  --}}
        @include('admin.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper px-4">
            <div class="content-header px-0">
                <h1 class="m-0">{{ isset($title) ? $title : Str::upper(Request::segment(2)) }}</h1>
                <nav aria-label="breadcrumb">
                    @if (Request::segment(2) != 'dashboard' && Request::segment(2) != 'profile')
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item {{ Request::segment(3) ? '' : 'active' }}">
                                @if (Request::segment(3))
                                    <a
                                        href="{{ route('admin.' . Request::segment(2) . '.index') }}">{{ Str::title(str_replace('-', ' ', Request::segment(2))) }}</a>
                                @else
                                    {{ Str::title(str_replace('-', ' ', Request::segment(2))) }}
                                @endif
                            </li>
                            @if (Request::segment(3))
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ Str::title(str_replace('-', ' ', Request::segment(3))) }}
                                </li>
                            @endif
                        </ol>
                    @endif
                </nav>
            </div>

            @yield('content')
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    {{-- bootstrap --}}
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- AdminLTE App -->
    <script defer src="{{ asset('admin/js/adminlte.min.js') }}"></script>

    @if (Session::has('message'))
        {{-- toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @endif

    {{-- toastr  --}}
    <script>
        @if (Session::has('message')) //toatser
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    @stack('scripts')

</body>

</html>
