@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Package Detail Form
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.package.country.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="package_id" value="{{$package_id}}">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="tab-content">
                                <div role="tabcard" >
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="">Select Country</label>
                                            <select name="country" id="" class="form-select form-control" required>
                                                <option value="">select country</option>
                                                @foreach ($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Package Name:</label>
                                            <input type="text" name="name" id="" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Currency:</label>
                                            <input type="text" name="currency" id="" class="form-control" placeholder="USD,EUR">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Price:</label>
                                            <input type="number" name="price" id="" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Offer Price:</label>
                                            <input type="number" name="offer_price" id="" class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Trip Introduction:</label>
                                            <textarea name="overview" cols="30" rows="10" id="summernote"></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Outline itinerary:</label>
                                            <textarea name="outline_itinerary" cols="30" rows="10" id="summernote7"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./ first tab ends -->
                            </div>
                            <div role="tabcard" class="tab-pane" id="profile">

                                <div>
                                    <div class="form-group">
                                        <div class="col-md-12 mb-3">
                                            <label>Detailed itinerary:</label>
                                            <textarea name="detailed_itinerary" cols="30" rows="10" id="summernote1"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div role="tabcard" class="tab-pane" id="messages">

                                <div>
                                    <div class="form-group">

                                        <label>Useful Info:</label>
                                        <textarea name="useful_info" cols="30" rows="10" id="summernote2"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div role="tabcard" class="tab-pane" id="faq">

                                <div>
                                    <div class="form-group">

                                        <label>FAQ:</label>
                                        <textarea name="faq" cols="30" rows="10" id="summernote3"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div role="tabcard" class="tab-pane" id="settings">

                                <div>
                                    <div class="form-group">
                                        <label>Whats Included:</label>
                                        <textarea name="include_exclude" cols="30" rows="10" id="summernote4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Whats Excluded:</label>
                                        <textarea name="trip_excludes" cols="30" rows="10" id="summernote5"></textarea>
                                    </div>
                                </div>
                            </div>

                        
                            <div role="tabcard" class="tab-pane" id="seo">
                                <div class="row">
                                    <div class="form-group col-md-6">

                                        <label>Meta Title</label>
                                        <input type="text" name="page_title" class="form-control">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>Meta Keyword</label>
                                        <input type="text" name="meta_keywords" class="form-control">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>Meta Author</label>
                                        <input type="text" name="meta_author" class="form-control">
                                    </div>
                                    <div class="form-group col-12 ">
                                        <label>Meta Description</label>
                                        <input type="text" name="meta_description" class="form-control">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">

                                        <label>Mobile Meta Title</label>
                                        <input type="text" name="mobile_meta_title" class="form-control">
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>Mobile Meta Keyword</label>
                                        <input type="text" name="mobile_meta_keyword" class="form-control">
                                    </div>

                                    <div class="form-group col-md-12 mb-3">
                                        <label>Mobile Meta Description</label>
                                        <input type="text" name="mobile_meta_description" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
    <!-- row -->
    </div>
@endsection

