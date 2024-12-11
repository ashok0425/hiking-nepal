@extends('admin.layouts.app')
@section('content')
@php
    define('PAGE','contact')

@endphp
<div class="container">
    <div class="card py-3 px-4">
            <h3>List of People Who want to contact</h3>

        <br>
<div class="table-responsive">
        <table id="example2" class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full name</th>
                    <th>Email</th>
                   
                    <th>Message</th>

                 

                </tr>
            </thead>
            <tbody>
                @foreach ($contact as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>

                        <td>{{$item->email}}</td>
                        <td ><div >
                            {{$item->comment}}
                        </div></td>

                        {{-- <td>@if ($item->status==0)
                            <div class="badge bg-warning">Not replied</div>
                            @else
                            <div class="badge bg-success">replied</div>

                        @endif</td> --}}

                      
                    </tr>
                @endforeach
            </tbody>
              </table>
    </div>
</div>
</div>



@endsection
