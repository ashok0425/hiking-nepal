@extends('admin.layouts.app')
@section('content')
    >
    <div class="container">
        <br>
        <br>

        <div class="card">
            <div class="card-body">
                <div class="panel-header  ">
                    <strong> Email Subject</strong>
                </div>
                <p>
                    {{ $email->title }}
                </p>
                <hr>

                <div class="panel-header ">
                    <strong> Email Body</strong>
                </div>

                <p>
                    {!! $email->email !!}
                </p>
                <hr>

                <div class="card-header ">
                    <strong> Attachment</strong>
                </div>

                <p>
                    <br>
                    @if ($email->image != null)
                        <img src="{{ getImageurl($email->image) }}" alt="Email Image" width="200" height="200"
                            class="img-fluid">
                    @else
                        <div class="text-danger">
                            No Attachment
                        </div>
                    @endif
                </p>
                <hr>

            </div>
        </div>

    </div>
@endsection
