@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Testimonial</h2>
        </div>
        <!-- Large modal -->

        <div class="clearfix"></div>
        <div class="card-body">
            <x-errormsg />


            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" enctype="multipart/form-data"
                method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name here" required
                            value="{{ $testimonial->name }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label> Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title here" required
                            value="{{ $testimonial->title }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" required value="{{ $testimonial->date }}">
                    </div>


                    <div class="form-group col-md-6">
                        <label>Select Package</label>
                        <select name="package[]" id="" class="form-control packages" multiple>
                            <option value="">--Select Package--</option>
                            @foreach ($edit_packages as $package)
                                <option value="{{ $package->id }}" selected>{{ $package->name }}</option>
                            @endforeach

                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group col-md-6">
                        <label>Select Image</label>
                        <input type="file" class="form-control" name="file">
                        <img src="{{ getImageurl($testimonial->image) }}" alt="{{ $testimonial->name }}" width="100">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Rating</label>
                        <input type="number" class="form-control" name="rating" placeholder="Enter rating here" required
                            value="{{ $testimonial->rating }}">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Review Content</label>
                        <textarea name="content" cols="30" rows="10" id="summernote">
                    {{ $testimonial->content }}
                </textarea>
                    </div>

                    <div class="form-group col-md-2">
                        <label>Show on Home page</label>
                        <input type="checkbox" class="form-control" name="display_home" value="1"
                            @if ($testimonial->display_home == 1) checked @endif>

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $('.packages').select2({
            placeholder: "Select package"
        });
    </script>
@endpush
