@extends('admin.layouts.app') 
@section('content')
<section class="container">
  <div class="card">
      <div class="card-body">
          
          <!-- /. -->

          <div class="d-flex justify-content-between align-items-center">
            <div >
              <h3 class="-title">DEPARTURE'S Data</h3>
            </div>
    <div> <a class="btn btn-primary" href="{{ route('admin.departures.create') }}"><i class="fa fa-plus"></i> Add departure</a></div>

          </div>
            <!-- /.-header -->
            <div class="-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Package</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody class="sortable-posts">
                  @foreach($departures as $departure)
                    <tr id="{{ $departure->id }}">
                        <td>
                            {{ $loop->iteration}}
                        </td>
                        <td>@if(isset($departure->package)){{ $departure->package->name }}@else NA @endif</td>

                        <td>{{ carbon\carbon::parse($departure->start_date)->format('d M Y') }}</td>
                        <td>{!! $departure->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                        <td>
                           <a href="{{ route('admin.departures.edit',$departure->id) }}" class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                           </a>

                           <a href="{{ route('admin.departures.delete',$departure->id ) }}" class="btn btn-danger btn-sm delete_row" id="" ><i class="fa fa-trash"></i>
                           </a>
                           @if ($departure->status==1)
                           <a href="{{route('admin.deactive',['id'=>$departure->id,'table'=>'departures'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                           @else
                           <a href="{{route('admin.active',['id'=>$departure->id,'table'=>'departures'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                           @endif

                        </td>
                    </tr>
                    @endforeach
                  

                </tbody>
                <tr>
                  <td colspan="5">{{ $departures->links() }}</td>
                </tr>
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


