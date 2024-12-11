@extends('admin.layouts.app') 
@section('content')
<div class="box">
	<div class="box-header with-border">
		<h2 class="box-title">Booking</h2>

		{{-- <a class="btn btn-primary pull-right" href="{{ route('packages.create') }}"><i class="fa fa-plus"></i> Add Package</a> --}}
	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="box-body">
        <div class="table-responsive111">
            <table id="example2" class="table table-bordered table-striped-col">
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Date</th>
                        
                        <th>Number of traveller</th>
                        <th>Contact Person</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Package</th>
                        <th>Date</th>
                        
                        <th>Number of traveller</th>
                        <th>Contact Person</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($bookings as $booking)
                    {{-- {{dd($booking->package)}} --}}
                    <tr>
                        <td>
                           {{$booking->package1->name}}
                        </td>
                        <td>{{$booking->date}}</td>
                        <td>{{$booking->no_traveller}}</td>
                        <td>{{$booking->customers()->first()->fname}}</td>
                       <td><a href="{{ route('bookingdetail',$booking->id) }}" class="btn btn-success">View More</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- panel -->
@endsection