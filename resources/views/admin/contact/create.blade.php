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
</style>
@endpush
@extends('admin.layouts.app')
@section('content')
@php
    define('PAGE','subscriber');
@endphp


<div class="card">
        <h3>Send Mail To {{ $con->name }}</h3>
   
    <div class="card-body">

        <form action=" {{route('admin.contacts.store')}}  " method="POST" enctype="multipart/form-data">
            @csrf
        <input type="hidden" value="{{ $con->email}}" name="email">
            <div class="mb-3">
                <label class="form-label">Mail Subject</label>
                <input type="text" name="title" class="form-control" placeholder="Mail title"value="{{old('title')}}" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label">Mail Body</label>
                <textarea type="text" name="detail"  class="form-control" placeholder="Email Detail" required id="summernote">
                    {{old('detail')}}
                </textarea>
            </div>
           
            <div class="mb-3">
                <label >Attachment</label>
                <div class="image-input">

                    <input type="file" accept="image/*" id="imageInput1" name="file" >
                    <label for="imageInput1" class="image-button"><i class="far fa-image"></i> Choose image</label>
                    <img src="" class="image-preview1">

                  </div>
            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
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
