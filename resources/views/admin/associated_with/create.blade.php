@extends('admin.layouts.app') 
@section('content')
<div class="card">
	<div class="card-header">
		<h2 class="card-title">Associated With Form</h2>
	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="card-body">
        {{ Form::open(['route' => 'associated-with.store']) }}
            @include('associated_with.partials.fields')
            <button type="submit" class="btn btn-primary m-t-20">Save</button>
        {{ Form::close() }}
    </div>
</div>
<!-- panel -->
@endsection
