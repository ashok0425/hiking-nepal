@extends('admin.layouts.app')
@section('content')
<section class="container">
  <div class="card">
      <div class="card-body">

          <!-- /. -->

          <div class="d-flex justify-content-between align-items-center">
            <div >
              <h3 class="-title">Package Gallery Data</h3>
            </div>
    <div> <a class="btn btn-primary" href="{{ route('admin.package.gallery.create',['package_id'=>request()->query('package_id')]) }}"><i class="fa fa-plus"></i> Add New</a></div>

          </div>
            <!-- /.-header -->
            <div class="-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody class="sortable-posts">
                  @foreach($galleries as $gallery)
                    <tr id="{{ $gallery->id }}">
                        <td>
                            {{ $loop->iteration}}
                        </td>
                        <td><img src="{{getImageUrl( $gallery->image) }}" alt="" width="70" height="70"></td>
                        <td>
                           <a href="{{ route('admin.package.gallery.edit',$gallery->id) }}" class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                           </a>

                           <a href="{{ route('admin.package.gallery.delete',$gallery->id ) }}" class="btn btn-danger btn-sm delete_row" id="delete_row" ><i class="fa fa-trash"></i>
                           </a>


                        </td>
                    </tr>
                    @endforeach
                </tbody>

              </table>
            </div>
            <!-- /.-body -->
          </div>
          <!-- /. -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>




@endsection


