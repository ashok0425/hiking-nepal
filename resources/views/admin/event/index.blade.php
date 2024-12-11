@extends('admin.layouts.app')
@section('content')
    <section class="container">
        <div class="card">
            <div class="card-body">

                <!-- /. -->

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="-title">Event List</h3>
                    </div>
                    <div> <a class="btn btn-primary" href="{{ route('admin.events.create') }}"><i class="fa fa-plus"></i> Add
                            Event</a></div>

                </div>
                <!-- /.-header -->
                <div class="-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Date</th>

                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="sortable-posts">
                            @foreach ($events as $event)
                                <tr id="{{ $event->id }}">
                                    <td>
                                        <img src="{{ getImageurl($event->image) }}" width="80">
                                    </td>
                                    <td>{{ $event->title }}</td>
                                    <td>{!! Str::limit(strip_tags($event->content), 100, '...') !!}</td>

                                    <td>{{ $event->date }}</td>


                                    <td>{!! $event->status == 1
                                        ? '<span class="badge bg-success">Active</span>'
                                        : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                                    <td>
                                        <a href="{{ route('admin.events.edit', $event->id) }}"
                                            class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('admin.events.delete', $event->id) }}"
                                            class="btn btn-danger btn-sm delete_row" id=""><i
                                                class="fa fa-trash"></i>
                                        </a>
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
