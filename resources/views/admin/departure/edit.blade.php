@extends('admin.layouts.app') 
@section('content')
<div class="card">
	<div class="card-header">
		<h2 class="card-title">Edit DEPARTURE's</h2>
	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="card-body">
        <x-errormsg/>
    

        <form action="{{ route('admin.departures.update',$departure->id) }}" enctype="multipart/form-data" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
         



            <div class="form-group col-md-6">
                <label >Select Package</label>
                <select name="package_id" id=""  class="form-control">
                    <option value="">--Select Package--</option>
                    @foreach ($packages as $package)
                    <option value="{{ $package->id }}"
                        @if ($package->id==$departure->package_id)
                            selected
                        @endif>{{ $package->name }}</option>
                        
                    @endforeach
                </select>
            </div>

         
            <div class="form-group col-md-6">
                <label > Start Date</label>
           <input type="date" class="form-control" name="start_date"  required value="{{ $departure->start_date }}">
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



