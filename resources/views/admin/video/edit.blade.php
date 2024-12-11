@extends('template.app')

@section('content')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit Video</span></h4>
            </div>
        </div>
    </div>
    
    <div class="content">
        <div class="card">
            <div class="card-body">
            {!! Form::model($video, ['route' => ['video.update', $video->id], 'enctype'=>'multipart/form-data', 'method' => 'PATCH']) !!}
                @include('video.partials.fields')
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection