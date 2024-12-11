@extends('admin.layouts.app')
@section('content')
    <section class="container">
        <div class="card">
            <div class="card-body">

                <!-- /. -->

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="-title">Destination</h3>
                    </div>
                    <div> <a class="btn btn-primary" href="{{ route('admin.destinations.create') }}"><i class="fa fa-plus"></i>
                            Add Destination</a></div>

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
                            @foreach ($destinations as $destination)
                                <tr id="{{ $destination->id }}">
                                    <td>
                                        <img src="{{ getImageurl($destination->image) }}" width="80">
                                    </td>
                                    <td>{{ $destination->name }}</td>
                                    <td>{!! Str::limit(strip_tags($destination->details), 50, '...') !!}</td>

                                    <td>{!! $destination->status
                                        ? '<span class="badge bg-success">Active</span>'
                                        : '<span class="badge bg-danger">Deactive</span>' !!}</td>

                                    </td>
                                    <td>
                                        <a href="{{ route('admin.destinations.edit', $destination->id) }}"
                                            class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.destination.delete', ['id' => $destination->id]) }}"
                                            class="btn btn-danger btn-sm delete_row" id="delete_row"><i
                                                class="fa fa-trash"></i>
                                        </a>

                                        @if ($destination->status == 1)
                                            <a href="{{ route('admin.deactive', ['id' => $destination->id, 'table' => 'destinations']) }}"
                                                class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                                        @else
                                            <a href="{{ route('admin.active', ['id' => $destination->id, 'table' => 'destinations']) }}"
                                                class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a>
                                        @endif
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
