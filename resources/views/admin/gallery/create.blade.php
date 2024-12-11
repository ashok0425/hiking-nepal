@extends('admin.layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<h2 class="card-title">Package Image Form</h2>
	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="card-body">
        <x-errormsg/>


        <form action="{{ route('admin.package.gallery.store') }}" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="package_id" value="{{request()->query('package_id')}}">
            @csrf
            <div class="row">
            <div class="form-group col-md-12">
                <label >Thumbnail</label>
           <input type="file" class="form-control" name="thumbnail" required>
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



