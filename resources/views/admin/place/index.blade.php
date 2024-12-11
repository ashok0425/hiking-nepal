@extends('admin.layouts.app')
@section('content')
    <section class="container">
        <div class="card">
            <div class="card-body">

                <!-- /. -->

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="-title">Categories Region</h3>
                    </div>
                    <div> <a class="btn btn-primary" href="{{ route('admin.categories-places.create') }}"><i
                                class="fa fa-plus"></i> Add Category Region</a></div>

                </div>
                <!-- /.-header -->
                <div class="-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="sortable-posts">
                            @foreach ($categories as $category)
                                <tr id="{{ $category->id }}">
                                    <td>
                                        <img src="{{ getImageurl($category->image) }}" width="80">
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{!! Str::limit(strip_tags($category->details), 50, '...') !!}</td>
                                    <td>{!! $category->status
                                        ? '<span class="badge bg-success">Active</span>'
                                        : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                                    <td>
                                        <a href="{{ route('admin.categories-places.edit', $category->id) }}"
                                            class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('admin.categories-places.delete', $category->id) }}"
                                            class="btn btn-danger btn-sm delete_row" id="delete_row"><i
                                                class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.-body -->
            </div>
            <!-- /. -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
