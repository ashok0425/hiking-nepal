@extends('admin.layouts.app') 
@section('content')
<div class="box">
    <div class="box-header ">
        <h2 class="box-title">Booking Detail</h2>

        {{-- <a class="btn btn-primary pull-right" href="{{ route('packages.create') }}"><i class="fa fa-plus"></i> Add Package</a> --}}
    </div>
</div>
<div class="row">  
@foreach($booking->customers as $key=>$customer) 
<div class="col-md-4">
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Traveller Info {{++$key}}</h3>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      {{-- <span class="label label-primary">Label</span> --}}
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <p><strong>Name:</strong>{{$customer->fname}}</p>
    <p><strong>Address:</strong> {{$customer->detail_mail_address}}</p>
    <p><strong>Country:</strong> {{$customer->country}}</p>
    <p><strong>Email:</strong> {{$customer->email}}</p>
    <p><strong>Phone:</strong> {{$customer->phone}}</p>
    <p><strong>DOB:</strong> {{$customer->dob}}</p>
    <p><strong>Passport number:</strong> {{$customer->passport_no}}</p>
    <p><strong>Expiry date:</strong> {{$customer->expiry}}</p>
    <p><strong>Emergency Contact:</strong> {{$customer->emergency_contact}}</p>
  </div>
  <!-- /.box-body -->
  {{-- <div class="box-footer">
    The footer of the box
  </div> --}}
  <!-- box-footer -->
</div>
</div>
@endforeach

</div>
<!-- /.box -->
@endsection