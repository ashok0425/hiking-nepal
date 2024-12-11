@extends('admin.layouts.app') 
@section('content')
<section class="container">
  <div class="card">
      <div class="card-body">
          
          <!-- /. -->

          <div class="d-flex justify-content-between align-items-center">
            <div >
              <h3 class="-title">FAQ's Data</h3>
            </div>
    <div> <a class="btn btn-primary" href="{{ route('admin.faqs.create') }}"><i class="fa fa-plus"></i> Add FAQ</a></div>

          </div>
            <!-- /.-header -->
            <div class="-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody class="sortable-posts">
                  @foreach($faqs as $faq)
                    <tr id="{{ $faq->id }}">
                        <td>
                            {{ $loop->iteration}}
                        </td>
                        <td>{{ $faq->question }}</td>
                        <td>{!! Str::limit(strip_tags($faq->answer), 150, '...') !!}</td>
                        <td>{!! $faq->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                        <td>
                           <a href="{{ route('admin.faqs.edit',$faq->id) }}" class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                           </a>

                           <a href="{{ route('admin.faqs.delete',$faq->id ) }}" class="btn btn-danger btn-sm delete_row" id="delete_row" ><i class="fa fa-trash"></i>
                           </a>
                           
                           @if ($faq->status==1)
                           <a href="{{route('admin.deactive',['id'=>$faq->id,'table'=>'faqs'])}}" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                           @else
                           <a href="{{route('admin.active',['id'=>$faq->id,'table'=>'faqs'])}}" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                           @endif
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


