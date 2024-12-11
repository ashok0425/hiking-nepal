 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{Str::upper(Request::segment(2))}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
            <li class="breadcrumb-item @if (Request::segment(3)!='')
                active
            @else

            @endif">{{Str::ucfirst(Request::segment(2))  }}</li>
            @if (Request::segment(3)!='')

            <li class="breadcrumb-item active">{{Str::ucfirst(Request::segment(3))}}</li>

            @endif ()


          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
