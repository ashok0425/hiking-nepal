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
            <h3 class="card-title"> Banner Form</h3>
        </div>

    <div class="card-body">
<x-errormsg/>
        <form action="{{route('admin.banners.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class=" col-md-6">
                <label class="form-label">Banner Title</label>
             <input name="title"   class='form-control' value=' {{ old('title') }}' type='text' placeholder="Enter Banner Title">
            </div>
            <div class=" col-md-6">
                <label class="form-label">Banner Link</label>
             <input name="link"   class='form-control' value=' {{ old('link') }}' type='url' placeholder="Enter Banner url">
            </div>
            <div class="col-md-6">
                <label class="form-label">Type</label>
                <select name="type" id="" class="form-control" >
                    <option value="1" @if (old('type')==1)
                        selected
                    @endif>Main</option>
                    <option value="0" @if (old('type')==0)
                        selected
                    @endif>Pop up</option>

                </select>
            </div>

            <div class=" col-md-6">
                <label class="form-label">Banner image (size:900 X 200)</label>
                    <div class="image-input">
                        <input type="file" accept="image/*" id="imageInput1" name="image" value="{{ old('image') }}">
                        <label for="imageInput1" class="image-button"><i class="far fa-image"></i> Choose image</label>
                        <img src="" class="image-preview1">
                  </div>
            </div>

            <div class=" col-md-12">
                <label class="form-label">Detail</label>
                <textarea name="details" id="summernote" cols="30" rows="10">{{ old('details') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Save</button>
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


	  </script>
	  @endpush