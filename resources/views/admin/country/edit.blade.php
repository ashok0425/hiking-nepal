@extends('admin.layouts.app') 
@section('content')
<div class="card">
	<div class="card-header">
		<h2 class="card-title">Edit Country</h2>
	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="card-body">
        <x-errormsg/>
        <form action="{{ route('admin.country.update',$country->id) }}" enctype="multipart/form-data" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
            <div class="form-group col-md-6">
                <label >Country</label>
           <input type="text" class="form-control" name="name" placeholder="Enter name here" required value="{{ $country->name }}">
            </div>

            <div class="form-group col-md-6">
                <label >Slug</label>
           <input type="text" class="form-control" name="slug" placeholder="Enter Short form of country" required value="{{ $country->slug }}">
            </div>
            <div class="form-group col-md-12">
                <input type="submit" class="btn btn-info btn-block">
            </div>
        </div>

        </form>
        
    </div>
</div>
<!-- panel -->
@endsection



