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

        .image-preview1,
        .image-preview2,
        .image-preview3,
        .image-preview4,
        .image-preview5 {
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

        #thumbAppendAlt input,
        #thumbAppendAlt1 input,
        #thumbAppendAlt2 input {
            width: 100px;
            margin: 10px 17px;
        }
    </style>
@endpush
@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header ">
                <h5 class="card-title">CMS Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.cms.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label>Title</label>
                                <input type="text" name="title" id="" class="form-control"
                                    value="{{ $menu->title }}" placeholder="Enter CMS page title">
                                @if ($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-5 offset-md-1">
                            <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                                <p>Main or Sub</p>
                                <div class="d-flex">
                                    <label>
                                        <input type="radio" name="main_or_sub" class="main_or_sub" value="1"
                                            @if ($menu->main_or_sub == 1) checked @endif> Main
                                    </label>
                                    <label class="mx-3">
                                        <input type="radio" name="main_or_sub" class="main_or_sub" value="0"
                                            @if ($menu->main_or_sub == 0) checked @endif> Sub
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">

                            <div id="maincms"
                                class="  @if ($menu->main_or_sub == 0) d-block
                @else 
                d-none @endif">
                                <div class="form-group">
                                    <label>Choose Main Page</label>

                                    <select name="parent_id" id="" class="form-control">
                                        @foreach ($maincms as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $menu->parent_id) selected @endif>{{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">


                                <label> Position:</label>
                                <input type="number" name="position" id="" placeholder="Enter Postion value"
                                    required class="form-control" value="{{ $menu->position }}">

                                @if ($errors->has('position'))
                                    <span class="help-block">{{ $errors->first('position') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-5 offset-md-1">
                            <div class="form-group">
                                <label class="ckbox ckbox-success">
                                    <p>Hide in Header</p>

                                    <input type="checkbox" name="hide_header" id="" value="1"
                                        class="form-control" @if ($menu->hide_header == 1) checked @endif>
                                </label>


                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="image-input">
                                <input type="file" accept="image/*" id="imageInput1" name="file"
                                    value="{{ old('file') }}">
                                <label for="imageInput1" class="image-button"><i class="far fa-image"></i> Choose
                                    image</label>
                                <img src="" class="image-preview1">
                            </div>
                            <img src="{{ getImageurl($menu->image) }}" width="100">

                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label>Content</label>
                                <textarea name="content" id="summernote" cols="30" rows="10">
            {{ $menu->content }}
        </textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <label class="form-label"> Meta Keyword</label>
                            <input name="keyword" class='form-control' value=' {{ $menu->keyword }}' type='text'
                                placeholder="Keyword">
                        </div>

                        <div class=" col-md-6">
                            <label class="form-label"> Meta Title</label>
                            <input name="meta_title" class='form-control' value=' {{ $menu->meta_title }}' type='text'
                                placeholder="Meta  Title">
                        </div>

                        <div class=" col-md-12">
                            <label class="form-label"> Meta Description</label>
                            <textarea name="meta_description" id="" class="form-control" rows="2" placeholder="Meta Description">
	{{ $menu->meta_description }}
 </textarea>
                        </div>
                        <input type="submit" value="save" class="btn btn-primary btn-block mt-2">
                    </div>
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

            if ($input.val().length > 0) {
                fileReader = new FileReader();
                fileReader.onload = function(data) {
                    $('.image-preview1').attr('src', data.target.result);
                }
                fileReader.readAsDataURL($input.prop('files')[0]);
                //   $('.image-button').css('display', 'none');
                $('.image-preview1').css('display', 'block');
                $('.change-image').css('display', 'block');
            }
        });

        $('.main_or_sub').click(function() {
            $val = $(this).val();
            if ($val == 0) {
                $('#maincms').addClass('d-block')
                $('#maincms').removeClass('d-none')

            } else {
                $('#maincms').removeClass('d-block')
                $('#maincms').addClass('d-none')
            }
        })
    </script>
@endpush
