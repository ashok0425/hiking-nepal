@extends('admin.master')
@section('main-content')

@php
    define('PAGE','assignrole')
@endphp
<div class="container">
    <div class="card py-3 px-4">
        <div class="row">
            <div class="col-md-6">
            <h3>Admin List</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{route('admin.assignrole.create')}}" class="badge bg-info py-2 px-2" ><i class="fas fa-plus"></i> create new</a>
        </div>
        </div>

        <table id="myTable" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($admin as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->role}}</td>

                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>



@endsection
