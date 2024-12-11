@push('style')
<style>

    .image-input {
	text-aling: center;
}

.image-input input {
	display: none;
}

.image-input label {
	display: block;
	color: #FFF;
	background: #000;
	padding: .3rem .6rem;
	font-size: 115%;
	cursor: pointer;
}

.image-input label i {
	font-size: 125%;
	margin-right: .3rem;
}

.image-input label:hover i {
	animation: shake .35s;
}

.image-input img {
	max-width: 175px;
	display: none;
}

.image-input span {
	display: none;
	text-align: center;
	cursor: pointer;
}
.image-preview1,.image-preview2,.image-preview3,.image-preview4,.image-preview5{
    max-height: 100px;
}
@keyframes shake {
	0% {
		transform: rotate(0deg);
	}

	25% {
		transform: rotate(10deg);
	}

	50% {
		transform: rotate(0deg);
	}

	75% {
		transform: rotate(-10deg);
	}

	100% {
		transform: rotate(0deg);
	}
}
    #thumbAppendAlt input ,#thumbAppendAlt1 input,#thumbAppendAlt2 input{
        width: 100px;
        margin: 10px 17px;
    }
    .nav-tabs{
    
    }
    </style>
@endpush
@extends('admin.layouts.app')
@section('content')

@php
    define('PAGE','add')
@endphp


<div class="card">
        <div class="card-header">
            <h3 class="card-title"> Blog Form</h3>
        </div>

    <div class="card-body">
<x-errormsg/>
        <form action="{{route('admin.blogs.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class=" col-md-6">
                <label class="form-label"> Title</label>
             <input name="title"   class='form-control' value=' {{ old('title') }}' type='text' placeholder="Enter  Title">
            </div>

            <div class=" col-md-6">
                <label class="form-label"> Url</label>
             <input name="url"   class='form-control' value=' {{ old('url') }}' type='text' placeholder="Enter  Url">
            </div>
            <div class=" col-md-12 my-2">
                <label class="form-label">Detail</label>
             <textarea name="content"  cols="30" rows="10" id="summernote">{{ old('content') }}</textarea>
            </div>
          

            <div class=" col-md-12">
                <label class="form-label">Thumbnail </label>
                    <div class="image-input">
                        <input type="file" accept="image/*" id="imageInput1" name="image" value="{{ old('image') }}">
                        <label for="imageInput1" class="image-button"><i class="far fa-image"></i> Choose image</label>
                        <img src="" class="image-preview1">
                  </div>
            </div>

            <div class=" col-md-12">
                <label class="form-label">Cover Image </label>
                    <div class="image-input">
                        <input type="file" accept="image/*" id="imageInput2" name="cover_image" value="{{ old('cover_image') }}">
                        <label for="imageInput2" class="image-button"><i class="far fa-image"></i> Choose image</label>
                        <img src="" class="image-preview2">
                  </div>
            </div>

            <div class=" col-md-6">
                <label class="form-label"> Meta Keyword</label>
             <input name="keyword"   class='form-control' value=' {{ old('keyword') }}' type='text' placeholder="Keyword">
            </div>

            <div class=" col-md-6">
                <label class="form-label"> Meta Title</label>
             <input name="meta_title"   class='form-control' value=' {{ old('meta_title') }}' type='text' placeholder="Meta  Title">
            </div>

            <div class=" col-md-12">
                <label class="form-label"> Meta Description</label>
           
             <input type="text" name="meta_description" class="form-control" value="{{old('meta_description')}}">
            </div>

            <div class=" col-md-6">
                <label class="form-label">Mobile Meta Keyword</label>
             <input name="mobile_keyword"   class='form-control' value=' {{ old('mobile_keyword') }}' type='text' placeholder="Mobile Keyword">
            </div>

            <div class=" col-md-6">
                <label class="form-label">Mobile Meta Title</label>
             <input name="mobile_title"   class='form-control' value=' {{ old('meta_title') }}' type='text' placeholder="Mobile Meta  Title">
            </div>

            <div class=" col-md-12">
                <label class="form-label">Mobile Meta Description</label>
           
             <input type="text" name="mobile_description" class="form-control" value="{{old('mobile_description')}}">
            </div>
           
            <button type="submit" class="btn btn-primary btn-block mt-2">Save</button>
        </div>
        </form>
    </div>
</div>
@endsection


@push('scripts')
         
{{-- custom input fielsd file  --}}
	  <script>
	// Add the following code if you want the name of the file appear on select
		$('#imageInput1').on('change', function() {
$input = $(this);

if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
  $('.image-preview1').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview1').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});


$('#imageInput2').on('change', function() {
$input = $(this);

if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
  $('.image-preview2').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview2').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});


	  </script>
	  @endpush