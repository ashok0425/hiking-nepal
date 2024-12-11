@extends('admin.layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<h2 class="card-title">Faq Form</h2>
	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="card-body">
        <x-errormsg/>


        <form action="{{ route('admin.faqs.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
            <div class="form-group col-md-6">
                <label >Question</label>
           <input type="text" class="form-control" name="question" placeholder="Enter Question here" required>
            </div>

            <div class="form-group col-md-6">
                <label > Answer</label>
           <input type="text" class="form-control" name="answer" placeholder="Enter Answer here" required>
            </div>


            <div class="form-group col-md-6">
                <label >Select Package</label>
                <select name="package_id" id=""  class="form-control">
                    <option value="">--Select Package--</option>
                    @foreach ($packages as $package)
                    <option value="{{ $package->id }}">{{ $package->name }}</option>

                    @endforeach
                </select>
            </div>


            <div class="col-md-6">
                <label><input type="checkbox" name="show_on_home_page" value="1"> Show on Home page</label>
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



