@extends('template.app')
@section('content')


@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Gallary Menu</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="card-header">

                        <!-- <a href="#" class="btn btn-warning"><i class="fa fa-arrow-circle-down m-r-10"></i>Import</a>
                            <a href="#" class="btn btn-success"><i class="fa fa-arrow-circle-up m-r-10"></i>Export</a> -->
                    </div>
                    <div class="panel panel-default">
                        <div class="card-header">
                            <a href="{{ route('video.create') }}" class="btn btn-primary"><i
                                    class="fa fa-plus m-r-10"></i>Add video detail</a>
                            <!-- <a href="#" class="btn btn-warning"><i class="fa fa-arrow-circle-down m-r-10"></i>Import</a>
                            <a href="#" class="btn btn-success"><i class="fa fa-arrow-circle-up m-r-10"></i>Export</a> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="dataTable_wrapper">
                                <div class="table-responsive">
                                    <table id="dynamic-table" class="display table table-bordered table-striped dataTable">
                                        <thead>
                                            <tr>

                                                <th>Name</th>

                                                <th>Id</th>
                                                <th>Status</th>
                                                <th>Details</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($videos as $video)
                                                <tr>
                                                    <td>{{ $video->name }}</td>
                                                    <td>{{ $video->video_id }}</td>
                                                    <td>{!! $video->status
                                                        ? '<p class="label label-success">Enabled</p>'
                                                        : '<p class="label label-warning">Disabled</p>' !!}</td>
                                                    <td>{!! str_limit($video->details, $limit = 45, $end = '...') !!}</td>
                                                    <td>
                                                        <a href="{{ route('video.edit', $video->id) }}"
                                                            class="btn btn-xs btn-warning"
                                                            style="float: left; margin-right: 10px;">Edit</a>
                                                        {{ Form::open(['route' => ['video.destroy', $video->id], 'method' => 'delete']) }}
                                                        <button type="submit" class="btn btn-danger btn-xs"
                                                            onclick="return confirm('Are you sure?')">Delete</button>
                                                        {{ Form::close() }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    @endsection

    @section('styles')
        <link href="{{ getImageurl('back-end/assets/advanced-datatable/media/css/demo_page.css') }}" rel="stylesheet" />
        <link href="{{ getImageurl('back-end/assets/advanced-datatable/media/css/demo_table.css') }}" rel="stylesheet" />
        <link href="{{ getImageurl('back-end/assets/data-tables/DT_bootstrap.css') }}" rel="stylesheet" />
    @endsection

    @section('scripts')
        <script type="text/javascript" language="javascript"
            src="{{ getImageurl('back-end/assets/advanced-datatable/media/js/jquery.dataTables.js') }}"></script>
        <script type="text/javascript" src="{{ getImageurl('back-end/assets/data-tables/DT_bootstrap.js') }}"></script>
        <script src="{{ getImageurl('back-end/js/dynamic_table_init.js') }}"></script>
    @endsection
