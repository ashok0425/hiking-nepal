@extends('admin.layouts.app') 
@section('content')
<section class="container">
  <div class="card">
      <div class="card-body">
          
          <!-- /. -->

          <div class="d-flex justify-content-between align-items-center">
            <div >
              <h3 class="-title">Blog List</h3>
            </div>
    <div> <a class="btn btn-primary" href="{{ route('admin.blogs.create') }}"><i class="fa fa-plus"></i> Add Blog</a></div>

          </div>
            <!-- /.-header -->
            <div class="-body">
              <table id="blog_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
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


@push('scripts')
    <script>
      $(document).ready(function(){
        
    var table = $('#blog_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/blogs') }}",
        columns: [
            {data: 'guid', name: 'guid'},
            {data: 'post_title', name: 'post_title'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
      })
    </script>
@endpush