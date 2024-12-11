@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Associated With</h2>

            <a class="btn btn-primary pull-right" href="{{ route('associated-with.create') }}"><i class="fa fa-plus"></i> Add
                Associated</a>
        </div>
        <!-- Large modal -->

        <div class="clearfix"></div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-bordered table-striped-col">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($associated_with as $associated)
                            <tr>
                                <td>{{ $associated->title }}</td>
                                <td>{{ $associated->link }}</td>
                                <td>{!! $associated->status
                                    ? '<span class="label label-success f-s-12">Enabled</span>'
                                    : '<span class="label label-warning f-s-12">Disabled</span>' !!}</td>
                                <td>
                                    <a href="{{ route('associated-with.edit', $associated->id) }}"
                                        class="btn btn-primary btn-sm pull-left m-r-10">Edit</a>
                                    {{ Form::open(['route' => ['associated-with.destroy', $associated->id], 'method' => 'delete']) }}
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- panel -->
@endsection


@section('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ getImageurl('dist/back-end/lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="">
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ getImageurl('dist/back-end/lib/datatables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript"
        src="{{ getImageurl('dist/back-end/lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js') }}">
    </script>
    <script>
        $('#example2').DataTable({
            aaSorting: []
        });
    </script>
@endsection
