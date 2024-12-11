@extends('admin.layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<h2 class="card-title">DEPARTURE's Form</h2>
	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="card-body">
        <x-errormsg/>


        <form action="{{ route('admin.departures.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">




            <div class="form-group col-md-6">
                <label >Select Package</label>
                <select name="package_id" id=""  class="form-control">
                    <option value="">--Select Package--</option>
                    @foreach ($packages as $package)
                    <option value="{{ $package->id }}">{{ $package->name }}</option>

                    @endforeach
                </select>
            </div>


            <div class="form-group col-md-6">
                <label > Start Date</label>

             <div class="dynamic_field">
               <div class="d-flex ">
                <input type="date" class="form-control" name="start_date[]"  required>
                <button type="button" class="btn btn-success " id="add_new_field"><i  class="i fas fa-plus"></i></button>
               </div>
             </div>
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
@push('scripts')
    <script>
      $(document).ready(function(){
        $('#add_new_field').click(function() {
   $('.dynamic_field').append(` <div class="d-flex mt-2">
                <input type="date" class="form-control" name="start_date[]"  required>
                <button type="button" class="btn btn-danger remove_new_field"><i  class="i fas fa-trash"></i></button>
               </div>`)
        })
        $(document).on('click','.remove_new_field',function(){
            $(this).parent().remove();
        })
      })
    </script>
@endpush



