@extends('admin.layouts.app')
@section('content')
    <section class="container">
        <div class="card">
            <div class="card-body">

                <!-- /. -->

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="-title">Banner's List</h3>
                    </div>
                    <div> <a class="btn btn-primary" href="{{ route('admin.banners.create') }}"><i class="fa fa-plus"></i> Add
                            Banner</a></div>

                </div>
                <!-- /.-header -->
                <div class="-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Type</th>

                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="sortable-posts">
                            @foreach ($banners as $banner)
                                <tr id="{{ $banner->id }}">
                                    <td>
                                        <img src="{{ getImageurl($banner->image) }}" width="80">
                                    </td>
                                    <td>{{ $banner->title }}</td>
                                    <td>{!! Str::limit(strip_tags($banner->details), 50, '...') !!}</td>
                                    <td>{!! $banner->type
                                        ? '<span class="badge bg-success">Main Banner</span>'
                                        : '<span class="badge bg-info">Pop up</span>' !!}</td>


                                    <td>{!! $banner->status
                                        ? '<span class="badge bg-success">Active</span>'
                                        : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                                    <td>
                                        <a href="{{ route('admin.banners.edit', $banner->id) }}"
                                            class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('admin.banners.delete', $banner->id) }}"
                                            class="btn btn-danger btn-sm delete_row" id=""><i
                                                class="fa fa-trash"></i>
                                        </a>

                                        @if ($banner->status == 1)
                                            <a href="{{ route('admin.deactive', ['id' => $banner->id, 'table' => 'main_slider']) }}"
                                                class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                                        @else
                                            <a href="{{ route('admin.active', ['id' => $banner->id, 'table' => 'main_slider']) }}"
                                                class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

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
