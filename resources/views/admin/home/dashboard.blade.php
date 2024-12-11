@extends('admin.layouts.app')
@section('content')
{{-- <div class="row">
	<div class="col-md-9 col-lg-8 dash-left">
		<div class="panel panel-announcement">
			<ul class="panel-options">
				<li><a><i class="fa fa-refresh"></i></a></li>
				<li><a class="panel-remove"><i class="fa fa-remove"></i></a></li>
			</ul>
			<div class="card-header">
				<h4 class="card-title">Welcome</h4>
			</div>
			<div class="card-body">
				detail here<a href="#">Take a Tour!</a></h4>
			</div>
		</div>

		<div class="row panel-quick-page">
			<div class="col-xs-4 col-sm-5 col-md-4 page-user">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Manage Users</h4>
					</div>
					<div class="card-body">
						<div class="page-icon"><i class="fa fa-users"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 page-products">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Manage Packages</h4>
					</div>
					<div class="card-body">
						<div class="page-icon"><i class="fa fa-shopping-cart"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-3 col-md-2 page-events">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Sliders</h4>
					</div>
					<div class="card-body">
						<div class="page-icon"><i class="fa fa-picture-o"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-3 col-md-2 page-messages">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">CMS</h4>
					</div>
					<div class="card-body">
						<div class="page-icon"><i class="fa fa-indent"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-5 col-md-2 page-reports">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Contact log</h4>
					</div>
					<div class="card-body">
						<div class="page-icon"><i class="fa fa-comments-o"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-2 page-statistics">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Testimonials</h4>
					</div>
					<div class="card-body">
						<div class="page-icon"><i class="fa fa-pencil-square-o"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 page-support">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Section Control</h4>
					</div>
					<div class="card-body">
						<div class="page-icon"><i class="fa fa-cogs"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-2 page-privacy">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Privacy</h4>
					</div>
					<div class="card-body">
						<div class="page-icon"><i class="icon ion-android-lock"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-2 page-settings">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Settings</h4>
					</div>
					<div class="card-body">
						<div class="page-icon"><i class="icon ion-gear-a"></i></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card-head style-danger">
				<header>Youtube</header>
			</div>
			@foreach($videos as $key=>$video)
			<div class="card-body col-md-4">
				<div class="row">
					<div class="col-md-12">
						<iframe src="https://www.youtube.com/embed/{{ $video->video_id }}{{ ($key==0)?'?loop=1&autoplay=1':'' }}" width="100%" height="350" allowfullscreen="" ></iframe>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					{!! Form::model($video, ['route' => ['videos.update', $video->id], 'enctype'=>'multipart/form-data', 'method' => 'PATCH']) !!}
						
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-content">
								<input name="youtubeurl" type="text" class="form-control" placeholder="Edit Youtube Url">
							</div>
							<div class="input-group-btn">
								<button class="btn btn-primary">Save</button>
							</div>
						</div>
					</div>
				<{!! Form::close() !!}
					</div>
				</div>
			</div>
			@endforeach
		</div>

		
		
	</div>
	<!-- col-md-9 -->
	<div class="col-md-3 col-lg-4 dash-right">
		<div class="row">
			
			<!-- col-md-12 -->
			<div class="col-sm-5 col-md-12 col-lg-6">
				<div class="panel panel-primary list-announcement">
					<div class="card-header">
						<h4 class="card-title">Previous Added Packages</h4>
					</div>
					<div class="card-body">
						<ul class="list-unstyled mb20">
							@foreach($latest_packages as $package)
							<li>
								<a href="#">{{ $package->name }}</a>
								<small>{{ date('F d, Y', strtotime($package->created_at)) }} <a href="#">{{ $package->destination->name }}</a></small>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="panel-footer">
						<a href="{{ route('packages.index') }}" class="btn btn-primary btn-block">View app packages<i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<!-- col-md-12 -->
		</div>
		<!-- row -->
	</div>
	<!-- col-md-3 -->
</div>
<!-- row --> --}}
Welcome
@endsection

