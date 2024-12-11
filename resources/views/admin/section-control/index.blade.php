@extends('admin.layouts.app') 
@section('content')
<section class="container">
  <div class="card">
      <div class="card-body">
          
          <!-- /. -->

          <div class="d-flex justify-content-between align-items-center">
            <div >
              <h3 class="card-title">Section Control Data</h3>
            </div>
    {{-- <div> <a class="btn btn-primary" href="{{ route('admin.section-control.create') }}"><i class="fa fa-plus"></i> Add section</a></div> --}}

          </div>
            <!-- /.-header -->
            <div class="-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody class="sortable-posts">
                  @foreach($sections as $section)
                    <tr id="{{ $section->id }}">
                      <td>{{ $section->name }}</td>
                      <td>{{ $section->display_name }}</td>
                        <td>{!! $section->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                        <td>
                           <a href="{{ route('admin.section-control.edit',$section->id) }}" class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                           </a>

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


