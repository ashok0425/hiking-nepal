@extends('admin.layouts.app') 
@section('content')
<div class="card">
	<div class="card-header">
		<h2 class="card-title">Edit Section Control</h2>
	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="card-body">
        <x-errormsg/>
    

        <form action="{{ route('admin.section-control.update',$section->id) }}" enctype="multipart/form-data" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
            <div class="form-group col-md-6">
                <label >Name</label>
           <input type="text" class="form-control" readonly placeholder="Enter name here" required value="{{ $section->name }}">
            </div>

            <div class="form-group col-md-6">
                <label > Display Name</label>
           <input type="text" class="form-control" name="display_name" placeholder="Enter title here" required value="{{ $section->display_name }}">
            </div>
        
            <div class="form-group col-md-12">
                <label >Details</label>
                <textarea name="details"  cols="30" rows="10" id="summernote">
                    {{ $section->details }}
                </textarea>
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



