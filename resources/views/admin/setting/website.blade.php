@extends('admin.layouts.app')

@section('content')
    @php
        define('PAGE', 'setting');
    @endphp
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Website Information</h3>

        </div>

        <div class="card-body">
            <div class="container">
                <form action="{{ route('admin.websites.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Meta Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Meta title"
                                    value="{{ $website->title }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Meta Keyword</label>
                                <input type="keyword" name="keyword" class="form-control" placeholder="Meta Keyword"
                                    value="{{ $website->keyword }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Meta Description</label>
                                <input type="text" name="descr" class="form-control" placeholder="Meta Description"
                                    value="{{ $website->descr }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Mobile Meta Title</label>
                                <input type="text" name="mobile_title" class="form-control" placeholder="Meta title"
                                    value="{{ $website->mobile_title }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Mobile Meta Keyword</label>
                                <input type="keyword" name="mobile_keyword" class="form-control" placeholder="Meta Keyword"
                                    value="{{ $website->mobile_keyword }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Mobile Meta Description</label>
                                <input type="text" name="mobile_description" class="form-control"
                                    placeholder="Meta Description" value="{{ $website->mobile_description }}">
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Website url</label>
                                <input type="url" name="url" class="form-control" placeholder="Website url"
                                    value="{{ $website->url }}">
                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Logo</label>
                                <div class="file-upload-wrapper" data-text="Select your file!">
                                    <input name="file" type="file" class="file-upload-field" value="">
                                </div>
                                <br>
                                <img src="{{ getImageurl($website->image) }}" width="70" alt="">
                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Fevicon</label>
                                <div class="file-upload-wrapper" data-text="Select your file!">
                                    <input name="fev" type="file" class="file-upload-field" value="">
                                </div>
                                <br>
                                <img src="{{ getImageurl($website->fev) }}" width="70" alt="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Copy Right</label>
                                <input type="text" name="copy_right" class="form-control"
                                    value="{{ $website->copy_right }}">

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card-header bg-gray">
                                <div class="card-title">
                                    Social Media
                                </div>
                            </div>
                            <br>

                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                </div>
                                <input type="url" class="form-control" value="{{ $website->facebook }}"
                                    name="facebook">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-instagram-square"></i></span>
                                </div>
                                <input type="url" class="form-control" value="{{ $website->instagram }}"
                                    name="instagram">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-twitter-square"></i></span>
                                </div>
                                <input type="url" class="form-control" value="{{ $website->twitter }}"
                                    name="twitter">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                </div>
                                <input type="url" class="form-control" value="{{ $website->linkdin }}"
                                    name="linkdin">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-plane"></i></span>
                                </div>
                                <input type="url" class="form-control" value="{{ $website->youtube }}"
                                    name="youtube">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-pinterest"></i></span>
                                </div>
                                <input type="url" class="form-control" value="{{ $website->pinterest }}"
                                    name="pinterest">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card-header bg-gray">
                                <div class="card-title">
                                    Nepal Branch Info
                                </div>
                            </div>
                            <br>
                        </div>



                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" value="{{ $website->email }}"
                                    name="email">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" value="{{ $website->email3 }}"
                                    name="email3">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                </div>
                                <input type="tel" class="form-control" value="{{ $website->phone }}"
                                    name="phone">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $website->address }}"
                                    name="address">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="card-header bg-gray">
                                <div class="card-title">
                                    USA Branch Info
                                </div>
                            </div>
                            <br>

                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" value="{{ $website->email2 }}"
                                    name="email2">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                </div>
                                <input type="tel" class="form-control" value="{{ $website->phone2 }}"
                                    name="phone2">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $website->address2 }}"
                                    name="address2">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="card-header bg-gray">
                                <div class="card-title">
                                    Expert Contact No
                                </div>
                            </div>
                            <br>

                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                </div>
                                <input type="tel" class="form-control" value="{{ $website->expert_phone1 }}"
                                    name="expert_phone1">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                </div>
                                <input type="tel" class="form-control" value="{{ $website->expert_phone2 }}"
                                    name="expert_phone2">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="card-header bg-gray">
                                <div class="card-title">
                                    Map
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{ $website->longitude }}"
                                name="longitude">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{ $website->latitude }}"
                                name="latitude">
                        </div>
                        <input type="submit" value="update" class="btn btn-block btn-info">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
