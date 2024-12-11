<div class="form-group">
	{{ Form::label('title', 'Title: ') }}
	{{ Form::text('title', Request::old('title'), ['class' => 'form-control', 'placeholder' => 'Title']) }}
</div>

<div class="form-group">
	{{ Form::label('link', 'Link: ') }}
	{{ Form::text('link', Request::old('link'), ['class' => 'form-control', 'placeholder' => 'Link']) }}
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