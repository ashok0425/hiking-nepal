@extends('admin.master')
@section('main-content')
    @php
        define('PAGE', 'assignrole');
    @endphp
    <div class="container">
        <div class="card">
            <h3 class="card-title pl-3 mt-1">Create Role</h3>

            <div class="card-body">
                <x-errormsg />
                <form action="{{ route('admin.assignrole.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="">--select role--</option>
                                @foreach ($role as $item)
                                    <option value="{{ $item->id }}">{{ $item->role }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
