
@extends('admin.layouts.app')
@section('content')

@php
    define('PAGE','role')
@endphp
<div class="container">
<div class="card">
<div class="card-header">
    <h3 class="card-title ">Create Role</h3>

</div>
    <div class="card-body">

        <form action="{{route('admin.role.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
<div class="row">
    <div class="col-md-12">
        <label >Role</label>
        <input type="text" class="form-control" name="role">
    </div>
    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="dashboard" value="1">&nbsp; <span class="font-weignt-800">Dashboard</span></label>
    </div>
    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="coupon" value="1">&nbsp; <span class="font-weignt-800">Coupon</span></label>
    </div>

    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="category" value="1">&nbsp; <span class="font-weignt-800">Category</span></label>
    </div>


    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="Profile" value="1">&nbsp; <span class="font-weignt-800">Profile</span></label>
    </div>



    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="product" value="1">&nbsp; <span class="font-weignt-800">Product</span></label>
    </div>



    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="order" value="1">&nbsp; <span class="font-weignt-800">Order</span></label>
    </div>



    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="banner" value="1">&nbsp; <span class="font-weignt-800">Banner</span></label>
    </div>




    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="faq" value="1">&nbsp; <span class="font-weignt-800">Faq</span></label>
    </div>



    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="blog" value="1">&nbsp; <span class="font-weignt-800">Blog</span></label>
    </div>


    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="setting" value="1">&nbsp; <span class="font-weignt-800">Setting</span></label>
    </div>

    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="user" value="1">&nbsp; <span class="font-weignt-800">User</span></label>
    </div>



    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="vendor" value="1">&nbsp; <span class="font-weignt-800">Vendor</span></label>
    </div>



    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="gst" value="1">&nbsp; <span class="font-weignt-800">Gst</span></label>
    </div>

    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="contact" value="1">&nbsp; <span class="font-weignt-800">Contact</span></label>
    </div>

    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="subscribe" value="1">&nbsp; <span class="font-weignt-800">Subscriber</span></label>
    </div>
    
    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="email_history" value="1">&nbsp; <span class="font-weignt-800">Email History</span></label>
    </div>
    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="role_permission" value="1">&nbsp; <span class="font-weignt-800">Role & Permission</span></label>
    </div>
    <div class="col-md-4">
        <label class="font-weight-600"><input type="checkbox" name="add" value="1">&nbsp; <span class="font-weignt-800">Add</span></label>
    </div>

</div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
</div>
@endsection


