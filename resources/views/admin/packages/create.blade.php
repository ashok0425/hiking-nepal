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
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Package Form
                    </div>
                </div>
                <div class="card-body">
<form action="{{ route('admin.categories-packages.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs d-flex justify-content-between" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Trip Details</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Itinerary</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Whats included</a></li>
                <li role="presentation"><a href="#equipment" aria-controls="equipment" role="tab" data-toggle="tab">Equipment</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Useful Information </a></li>
                 <li role="presentation"><a href="#faq" aria-controls="faq" role="tab" data-toggle="tab">FAQ</a></li>
                <li role="presentation"><a href="#package" aria-controls="package" role="tab" data-toggle="tab">Recommended package</a></li>
                <li role="presentation"><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">Seo</a></li>
                <button type="submit" class="pull-right btn btn-success btn-lg">Submit</button>
            </ul>
            <div class="tab-content">
                <div role="tabcard" class="tab-pane active" id="home">
                    {{--
                    <h3>Package Details <small>Enter information.</small></h3> --}}
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group ">
                                               <label >Name</label>
                                                <input type="text" name="name" class="form-control" required placeholder="Trip Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group ">
                                                <label >Trip ID</label>
                                                <input type="text" name="trip_id" class="form-control" required placeholder="Trip ID">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="form-group ">
                                                <label >Slugable url</label>
                                                <input type="text" name="slug" class="form-control" required placeholder="Enter Slug">
                                            </div>
                                        </div>


                                        <div class="form-group ">

                                            <label > Destination</label>
                                         <select name="destination_id" id="destination_id" class="form-control" required>
                                             <option value="">--select  destination--</option>
                                            @foreach ($destinations as $destination)
                                             <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>


                                        <div class="form-group ">

                                            <label > Select Category Place</label>
                                         <select name="category_place_id" id="destination_id" class="form-control" >
                                             <option value="">--select  destination--</option>
                                            @foreach ($places as $place)
                                             <option value="{{ $place->id }}">{{ $place->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>

                                        <div class="form-group ">

                                            <label > Destination wise Category</label>
                                            <input type="hidden" id="all_category_destination" value="{{ $categories_destinations }}">
                                         <select name="category_destination_id" id="category_destination_id" class="form-control" >


                                        </select>
                                        </div>
                                        <div class="form-group">
                                             <label >Duration</label>
                                            <input type="text" name="duration" class="form-control"  placeholder="Enter Duration">
                                        </div>

                                        <div class="form-group">
                                            <label >Price</label>
                                            <input type="number" name="price" class="form-control" required placeholder="Enter Price">
                                        </div>

                                        <div class="row">


                                            <div class="col-md-12" id="addSelect">
                                                <div class="form-group">
                                                    <label class="ckbox ckbox-success">
                                                        <input type="checkbox" name="deal_package" value="1" id="deal">
                                                        <span>Deal/discount Package</span>
                                                    </label>
                                                    <label class="ckbox ckbox-success">
                                                        <input type="checkbox" name="popular_package" value="1">
                                                        <span>Popular Package</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="show" style="display: none;">
                                            <input type="number" name="discounted_price" class="form-control"  placeholder="Enter Discounted Price">
                                        </div>

                                        <div class="form-group" id="region_display" >
                                            {{-- {{ Form::label('category_place_id', 'Select Region(optional)') }} {{ Form::select('category_place_id', $places,null, ['class' => 'form-control', 'placeholder' => 'Select Region']) }}
    {{--  --}}
                                            <label >Price</label>
                                            <input type="number" name="price" class="form-control" required placeholder="Enter Price"> --}}
                                        </div>

                                        <div class="form-group">

                                            <label >Price</label>
                                          <select name="rating"  class="form-control">
                                              <option value="">--select rating</option>
                                              <option value="1">1 star</option>
                                              <option value="2">2 star</option>
                                              <option value="3">3 star</option>
                                              <option value="4">4 star</option>
                                              <option value="5">5 star</option>

                                          </select>

                                        </div>


                                        <div class="form-group">
                                            <label >Enter Menu Order</label>
                                            <input type="number" name="order" class="form-control" min="1" value="1">
                                        </div>



                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                                                <label >Activity</label>
                                            <input type="text" name="activity" class="form-control"  placeholder="Enter Activity">
                                        </div>
                                        <div class="form-group">

                                            <label >Difficulty level</label>
                                            <input type="text" name="fitness_level" class="form-control"  placeholder="Enter Fitness level">
                                        </div>
                                        <div class="form-group">
                                            <label >Max Altitude</label>
                                            <input type="text" name="max_altitude" class="form-control"  placeholder="Enter Max Altitude">
                                        </div>
                                        <div class="form-group">

                                            <label >Transport</label>
                                            <input type="text" name="transport" class="form-control"  placeholder="Enter about transport">
                                        </div>
                                        <div class="form-group">
                                         <label >Best Month</label>
                                            <input type="text" name="best_month" class="form-control"  placeholder="Enter about best month">
                                        </div>
                                        <div class="form-group">
                                            <label >Group Size</label>
                                            <input type="text" name="group_size" class="form-control"  placeholder="Enter Group size">
                                        </div>
                                         <div class="form-group">
                                             <label >Enter Arrival</label>
                                            <input type="text" name="arrival" class="form-control"  placeholder="Enter Arrival">
                                        </div>
                                        <div class="form-group">
                                            <label >Departure from</label>
                                            <input type="text" name="departure_from" class="form-control"  placeholder="Enter Departure from">
                                        </div>
                                        <div class="form-group">
                                            <label >Meals</label>
                                            <input type="text" name="meals" class="form-control"  placeholder="Enter meals">
                                        </div>
                                        <div class="form-group">
                                             <label >Room/Accomodation</label>
                                            <input type="text" name="room" class="form-control"  placeholder="Room/Accomodation">
                                        </div>
                                    </div>
                                </div>
                                <!-- ./ row -->
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label >Thumbnail Image</label>
                                <div class="image-input">
                                    <input type="file" accept="image/*" id="imageInput1" name="thumbnail" >
                                    <label for="imageInput1" class="image-button"><i class="far fa-image"></i> Choose image</label>
                                    <img src="" class="image-preview1">

                                  </div>
                            </div>
                            <div class="col-md-6">
                                <label >Cover Image</label>

                                <div class="image-input">
                                    <input type="file" accept="image/*" id="imageInput2" name="cover" >
                                    <label for="imageInput2" class="image-button"><i class="far fa-image"></i> Choose image</label>
                                    <img src="" class="image-preview2">

                                  </div>
                            </div>

                            <div class="col-md-6">
                                <label >Map Image</label>
                                <div class="image-input">
                                    <input type="file" accept="image/*" id="imageInput3" name="roadmap" >
                                    <label for="imageInput3" class="image-button"><i class="far fa-image"></i> Choose image</label>
                                    <img src="" class="image-preview3">

                                  </div>

                            </div>

                            <div class="col-md-6">
                                <label >Altitude Image</label>
                                <div class="image-input">
                                    <input type="file" accept="image/*" id="imageInput4" name="circuit_image" >
                                    <label for="imageInput4" class="image-button"><i class="far fa-image"></i> Choose image</label>
                                    <img src="" class="image-preview4">

                                  </div>

                            </div>

                            <div class="col-md-6">
                                <label >Map Title</label>
                             <input type="text" name="map_title" id="" class="form-control" value="{{old('map_title')}}">

                            </div>

                            <div class="col-md-6">
                                <label >Altitude Title</label>
                             <input type="text" name="circuit_title" id="" class="form-control" value="{{old('circuit_title')}}">

                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-12">
                                Gallery Image
                                <div class="image-input">
                                    <input type="file" accept="image/*" id="imageInput3" name="gallery" >
                                    <label for="imageInput3" class="image-button"><i class="far fa-image"></i> Choose image</label>
                                    <img src="" class="image-preview3">

                                  </div>
                                </div>

                            </div> --}}

                        <div class="row">
                            <div class="col-md-12 my-2">
                            <label >Package Video</label>

                                    <input class="form-control" type="text" id="formFile" name="video">
                                  </div>
                            <div class="col-md-12">
                               <label >Trip Introduction:</label>
                                <textarea name="overview"  cols="30" rows="10" id="summernote"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label >Outline itinerary:</label>
                                 <textarea name="outline_itinerary"  cols="30" rows="10" id="summernote7"></textarea>
                             </div>


                        </div>
                    </div>
                    <!-- ./ first tab ends -->
                </div>
                <div role="tabcard" class="tab-pane" id="profile">

                    <div>
                        <div class="form-group">
                             <div class="col-md-12">
                                <label >Detailed  itinerary:</label>
                                 <textarea name="detailed_itinerary"  cols="30" rows="10" id="summernote1"></textarea>
                             </div>
                        </div>

                    </div>
                </div>
                <div role="tabcard" class="tab-pane" id="messages">

                    <div>
                        <div class="form-group">

                            <label >Useful Info:</label>
                                 <textarea name="useful_info"  cols="30" rows="10" id="summernote2"></textarea>
                        </div>

                    </div>
                </div>
                <div role="tabcard" class="tab-pane" id="faq">

                    <div>
                        <div class="form-group">

                            <label >FAQ:</label>
                            <textarea name="faq"  cols="30" rows="10" id="summernote3"></textarea>
                        </div>

                    </div>
                </div>
                <div role="tabcard" class="tab-pane" id="settings">

                    <div>
                        <div class="form-group">
                            <label >Whats Included:</label>
                            <textarea name="include_exclude"  cols="30" rows="10" id="summernote4"></textarea>
                        </div>
                        <div class="form-group">
                            <label >Whats Excluded:</label>
                            <textarea name="trip_excludes"  cols="30" rows="10" id="summernote5"></textarea>
                        </div>
                    </div>
                </div>

                <div role="tabcard" class="tab-pane" id="equipment">
                    <div>
                        <div class="form-group">
                         <label >Equipments required:</label>
                            <textarea name="equipment"  cols="30" rows="10" id="summernote6"></textarea>
                        </div>
                    </div>
                </div>
                <div role="tabcard" class="tab-pane" id="package">


                            <label class="font-weight-bold">Click to select featured Package</label>
                            <div class="row">
                           @foreach ($featured_package as $item)
                           <div class="col-md-4">
                            <label><input type="checkbox" name="featured_package[]" value="{{ $item->id }}"> {{ $item->name }}</label>
                        </div>
                           @endforeach
                        </div>
                </div>
                <div role="tabcard" class="tab-pane" id="seo">
                    <div class="row">
                    <div class="form-group col-md-6">

                        <label >Meta Title</label>
                        <input type="text" name="page_title"  class="form-control">
                    </div>
                    <div class="form-group  col-md-6">
                        <label >Meta Keyword</label>
                        <input type="text" name="meta_keywords"  class="form-control" >
                    </div>
                    <div class="form-group  col-md-6">
                        <label >Meta Author</label>
                        <input type="text" name="meta_author"  class="form-control" >
                    </div>
                    <div class="form-group col-12 ">
                        <label >Meta Description</label>
                        <input type="text"  name="meta_description" class="form-control">
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-6">

                        <label >Mobile Meta Title</label>
                        <input type="text" name="mobile_meta_title"  class="form-control" >
                    </div>
                    <div class="form-group  col-md-6">
                        <label >Mobile Meta Keyword</label>
                        <input type="text" name="mobile_meta_keyword"  class="form-control" >
                    </div>

                    <div class="form-group col-md-12">
                        <label >Mobile Meta Description</label>
                        <input type="text"  name="mobile_meta_description" class="form-control">
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- col-md-6 -->
    </div>
</form>
</div>
</div>
    <!-- row -->
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


	// Add the following code if you want the name of the file appear on select
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

	// Add the following code if you want the name of the file appear on select
    $('#imageInput3').on('change', function() {
$input = $(this);

if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
  $('.image-preview3').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview3').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});

// Add the following code if you want the name of the file appear on select
$('#imageInput4').on('change', function() {
$input = $(this);

if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
  $('.image-preview4').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview4').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});

            if($("#deal").attr("checked")){
                 $('#show').show();
            }
            $("#deal").click(function(){
                 $('#show').slideToggle();
                 $('#show').show();

            })



            function ajaxCategory() {
                category_destination = $('#all_category_destination').val();
              let arr= JSON.parse(category_destination)
                $('#destination_id').change(function() {
                var myCategory = $(this).val();
                 newarr=arr.filter((item)=>(item.destination_id==myCategory))
               let data =newarr.map(item=>(
                   '<option value ="'+item.id+'">'+item.name+'</option>'
               ))
                 $('#category_destination_id').html(data)
                })
            }

            ajaxCategory();




        </script>
    @endpush
