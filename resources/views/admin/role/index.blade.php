@extends('admin.layouts.app')
@section('content')

@php
    define('PAGE','role')
@endphp
<div class="container">
    <div class="card py-3 px-4">
        <div class="row">
            <div class="col-md-6">
            <h3>Role List</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{route('admin.role.create')}}" class="badge bg-info py-2 px-2" ><i class="fas fa-plus"></i> Add Role</a>
        </div>
        </div>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Role</th>
                    <th>Permission</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($role as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->role}}</td>

                        <td>
                            @if ($item->dashboard==1)
                            <div class="badge bg-sucess">Dashboard</div> 
                            @endif
                            @if ($item->coupon==1)
                            <div class="badge bg-info">Coupon</div> 
                            @endif

                            @if ($item->category==1)
                            <div class="badge bg-warning">Category</div> 
                            @endif

                            @if ($item->profile==1)
                            <div class="badge bg-warning">Profile</div> 
                            @endif

                            @if ($item->product==1)
                            <div class="badge bg-warning">Product</div> 
                            @endif


                            @if ($item->order==1)
                            <div class="badge bg-warning">Order</div> 
                            @endif


                            @if ($item->banner==1)
                            <div class="badge bg-warning">Banne</div> 
                            @endif

                            @if ($item->blog==1)
                            <div class="badge bg-success">Blog</div> 
                            @endif

                            @if ($item->faq==1)
                            <div class="badge bg-info">Faq</div> 
                            @endif

                            @if ($item->setting==1)
                            <div class="badge bg-warning">Setting</div> 
                            @endif

                            @if ($item->user==1)
                            <div class="badge bg-primary">user</div> 
                            @endif

                            @if ($item->vendor==1)
                            <div class="badge bg-warning">Vendor</div> 
                            @endif



                            @if ($item->gst==1)
                            <div class="badge bg-success">Gst</div> 
                            @endif 

                            @if ($item->subscribe==1)
                            <div class="badge bg-primary">Subscribe</div> 
                            @endif

                            @if ($item->email_history==1)
                            <div class="badge bg-warning">email_history</div> 
                            @endif
                        </td>

                      
                        <td>

                            <a href="{{route('admin.role.edit',['id'=>$item->id])}}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                            <a  href="{{route('admin.role.delete',['id'=>$item->id,'table'=>'roles'])}}" class="btn btn-danger delete_row"><i class="fas fa-times"></i></a>
                          


                        </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection
