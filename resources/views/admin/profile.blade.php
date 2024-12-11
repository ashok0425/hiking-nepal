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
    </style>
@endpush
@extends('admin.layouts.app')
@section('content')
    @php
        define('PAGE', 'profile');
    @endphp
    <div class="container">


        <div class="row">

            <div class="col-md-8 col-xl-9 offset-md-2">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header">

                        <h3 class=" mb-0">Update profile</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="image-input">
                                    <input type="file" accept="image/*" id="imageInput1" name="file">
                                    <label for="imageInput1" class="image-button"><i class="far fa-image"></i> Choose
                                        image</label>

                                </div>
                                <div class="d-flex">
                                    <img src="" class="image-preview1 mr-2">

                                    <img src="{{ getImageurl(__getAdmin()->profile_photo_path) }}" alt=""
                                        width="70" class='image1'>
                                </div>

                            </div>
                            <div class="form- mt-2">
                                <input type="text" value="{{ __getAdmin()->name }}" class="form-control" name="name"
                                    required>

                            </div>
                            <div class="form-group mt-2">
                                <input type="email" value="{{ __getAdmin()->email }}" class="form-control" name="email"
                                    required>

                            </div>
                            <div class="form-group mt-2">

                                <input type="text"
                                    value="updated at: {{ carbon\carbon::parse(__getAdmin()->updated_at)->diffForHumans() }}"
                                    class="form-control" readonly>
                            </div>
                            <div class="form-group mt-2">
                                <input type="submit" value="save" class="form-control btn btn-info">
                            </div>
                        </form>


                    </div>


                </div>
            </div>
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
                    $('.image1').css('display', 'none')
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
