<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{{ Form::label('name', 'Name: ') }}
	{{ Form::text('name', Request::old('name'), ['class' => 'form-control', 'placeholder' => 'Enter name here', 'required']) }}
	@if($errors->has('name'))
		<span class="help-block">{{ $errors->first('name') }}</span>
	@endif
</div>

<div class="form-group{{ $errors->has('video_id') ? ' has-error' : '' }}">
	{{ Form::label('video_id', 'Youtube video link Or Video id: ') }}
	{{ Form::text('video_id', Request::old('video_id'), ['class' => 'form-control', 'placeholder' => 'Enter video_id or id here', 'required']) }}
	@if($errors->has('video_id'))
		<span class="help-block">{{ $errors->first('video_id') }}</span>
	@endif
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
	{{ Form::label('status', 'Status: ') }}
	<div class="switch-field">
		{{ Form::radio('status',1, null, ['id' => 'switch_left', 'checked']) }}
		<label for="switch_left">Enable</label>
		{{ Form::radio('status',0, null, ['id' => 'switch_right']) }}
		<label for="switch_right">Disable</label>
	</div>

	@if($errors->has('status'))
		<span class="help-block">{{ $errors->first('status') }}</span>
	@endif
</div>

<div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
	{{ Form::label('details', 'Details: ') }}
	{{ Form::textarea('details', Request::old('details'), ['class' => 'form-control', 'placeholder' => 'Enter details here']) }}
	@if($errors->has('details'))
		<span class="help-block">{{ $errors->first('details') }}</span>
	@endif
</div>