<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="fb:app_id" content="160443599540603" />
    <meta property="og:url" content="@yield('url')" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('descr')" />
    <meta property="og:image" content="@yield('img')" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="author" content="{{$seo->meta_author}}"> --}}
    <meta name="keyword" content="@yield('keyword')">
    <meta name="description" content="@yield('descr')">

    <link rel="icon" href="@yield('fev')" type="image/icon type">

    <title>@yield('title')</title>


    {{-- bootstrap --}}
    <link rel="preload stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" as="style">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-8/css/all.css"
        integrity="sha512-FoiDc40LwNkhzC9yHQU/yOEHV2+SvUvN4/XZEkcGvlPr14tfocjIM63TD9kmoLkPG3YGrwZL/NglmdKM5+hCnA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="preload stylesheet" href="{{ getFilePath('admin/dist/css/adminlte.min.css') }}" as="style">

    @stack('style')
    <style>
        label {
            font-size: 14px;
            font-weight: 400 !important;
        }

        h1 {
            font-size: 20px !important;

        }

        h3 {
            font-size: 18px !important;
            padding: 1rem;
            font-weight: bold;
        }

        .nav-link {
            font-size: 16px !important;

        }

        .nav-treeview .nav-link {
            font-size: 14px !important;

        }

        input::placeholder {
            font-size: 11px !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">




        {{-- header  --}}
        @include('admin.layouts.header')

        {{-- sidebar  --}}
        @include('admin.layouts.leftpanel')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('admin.layouts.breadcrum')

            @yield('content')

        </div>
        <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- boostrap --}}
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script defer src="{{ getFilePath('admin/dist/js/adminlte.js') }}"></script>


    @if(!str_contains(url()->current(),'edit')&&!str_contains(url()->current(),'create'))
  {{-- datatables  --}}
  <link rel="preload stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" as="style">
  <link rel="preload stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" as="style"/>
  <link rel="preload stylesheet" href='https//cdn.datatables.net/responsive/2.2.9/css/dataTables.responsive.css' as="style" />
    <script defer src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script defer src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
     {{-- datatables iniziing --}}
    <script>
     setTimeout(() => {
        if (window.innerWidth <= 700) {
            var table = $('#example2').DataTable({
                "scrollX": true,

                select: true,
                dom: 'Blfrtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 row', '25 row', '50 row', 'All Rows']
                ],
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'print',
                        exportOptions: {
                            stripHtml: false,
                            columns: ':visible:not(:last-child,:nth-last-child(2))'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            stripHtml: false,
                            columns: ':visible:not(:last-child,:nth-last-child(2))'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            stripHtml: false,
                            columns: ':visible:not(:last-child,:nth-last-child(2))'
                        }
                    },

                    {
                        extend: 'colvis',

                    },
                    'pageLength',
                ]
            });

        } else {

            var table = $('#example2').DataTable({
                // "scrollX": true,
                select: true,
                dom: 'Blfrtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 row', '25 row', '50 row', 'All Rows']
                ],
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'print',
                        exportOptions: {
                            stripHtml: false,
                            columns: ':visible:not(:last-child,:nth-last-child(2))'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            stripHtml: false,
                            columns: ':visible:not(:last-child,:nth-last-child(2))'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            stripHtml: false,
                            columns: ':visible:not(:last-child,:nth-last-child(2))'
                        }
                    },

                    {
                        extend: 'colvis',

                    },
                    'pageLength',

                ]
            });

        }
     }, 2000);
    </script>

    @endif

    @if (Session::has('messege'))
 {{-- toastr --}}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script  src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @endif
    {{-- toastr  --}}
    <script>
        @if (Session::has('messege')) //toatser
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
            }
        @endif
    </script>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor.js') }}"></script>

    <script>
        $('#delete_row').click(function(e) {
            e.preventDefault()
            url = $(this).attr('href')
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this  file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = url;


                    } else {
                        swal("Your Data is safe!");
                    }
                });
        })
    </script>


    @stack('scripts')

</body>

</html>
