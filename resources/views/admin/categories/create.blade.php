@extends('admin.layouts.app') 
@section('content')
<div class="card">
	<div class="card-header">
		<h2 class="card-title">Categories Destination Form</h2>
	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="card-body">
        <x-errormsg/>
    

        <form action="{{ route('admin.categories-destinations.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
            <div class="form-group col-md-6">
                <label >Name</label>
           <input type="text" class="form-control" name="name" placeholder="Category Destination Name">
            </div>

            <div class="form-group col-md-6">
                <label >Select Destination</label>
                <select name="destination" id="" required class="form-control">
                    <option value="">--Select Destination--</option>
                    @foreach ($destinations as $detination)
                    <option value="{{ $detination->id }}">{{ $detination->name }}</option>
                        
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3 col-6 ">
                <label >Order Number</label>
           <input type="number" class="form-control" name="order" placeholder="Order number">
            
            </div>

            <div class="form-group col-md-3 col-6 text-center">
                <label >Display in Quick Trip section</label>
                <p></p>
           <input type="checkbox"  name="quick_trip" value="1">
            
            </div>

            <div class="form-group col-md-6">
                <label >Select Image</label>
           <input type="file" class="form-control" name="file" >
            </div>

            <div class="form-group col-md-12">
                <label >Detail</label>
                <textarea name="details"  cols="30" rows="10" id="summernote"></textarea>
            </div>

            <hr>            
            <div class="card-header col-12">
		<h2 class="card-title">SEO </h2>
            </div>
          <hr>            
            <div class="form-group col-md-6">
                <label >Meta Title</label>
           <input type="text" class="form-control" name="meta_title" >
            </div>
            <div class="form-group col-md-6">
                <label >Meta KeyWord</label>
           <input type="text" class="form-control" name="meta_keyword" >
            </div>

            <div class="form-group col-md-12">
                <label >Meta Description</label>
                <textarea name="meta_description"   rows="2" class="form-control"></textarea>

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



