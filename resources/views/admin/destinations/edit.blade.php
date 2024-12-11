@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Destinations Form</h2>
        </div>
        <!-- Large modal -->

        <div class="clearfix"></div>
        <div class="card-body">
            <x-errormsg />

            <form action="{{ route('admin.destinations.update', $destination->id) }}" enctype="multipart/form-data"
                method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Destination Name"
                            value="{{ $destination->name }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Select Image</label>
                        <input type="file" class="form-control" name="file" placeholder="Destination Image">
                        <a href="{{ getImageurl($destination->image) }}" download="destination" rel="noreferrer"
                            target="_blank">
                            <img src="{{ getImageurl($destination->image) }}" alt="{{ getImageurl($destination->name) }}"
                                width="100">

                        </a>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Detail</label>
                        <textarea name="details" cols="30" rows="10" id="summernote">
                {{ $destination->details }}

                </textarea>
                    </div>

                    <hr>
                    <div class="card-header col-12">
                        <h2 class="card-title">SEO </h2>
                    </div>
                    <hr>
                    <div class="form-group col-md-6">
                        <label>Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $destination->meta_title }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Meta KeyWord</label>
                        <input type="text" class="form-control" name="meta_keyword"
                            value="{{ $destination->meta_keyword }}">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Meta Description</label>
                        <textarea name="meta_description" rows="2" class="form-control">{{ $destination->meta_description }}</textarea>

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
