@extends('admin.layouts.app')
@section('content')
    <section class="container">
        <div class="card">
            <div class="card-body">

                <!-- /. -->

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="-title">Testimonials Data</h3>
                    </div>
                    <div> <a class="btn btn-primary" href="{{ route('admin.testimonials.create') }}"><i class="fa fa-plus"></i>
                            Add Testimonial</a></div>

                </div>
                <!-- /.-header -->
                <div class="-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="sortable-posts">
                            @foreach ($testimonials as $testimonial)
                                <tr id="{{ $testimonial->id }}">
                                    <td>
                                        <img src="{{ getImageurl($testimonial->image) }}" width="80">
                                    </td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{!! Str::limit(strip_tags($testimonial->content), 50, '...') !!}</td>
                                    <td>{!! $testimonial->status
                                        ? '<span class="badge bg-success">Active</span>'
                                        : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                                    <td>
                                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                            class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('admin.testimonials.delete', $testimonial->id) }}"
                                            class="btn btn-danger btn-sm delete_row" id=""><i
                                                class="fa fa-trash"></i>
                                        </a>

                                        @if ($testimonial->status == 1)
                                            <a href="{{ route('admin.deactive', ['id' => $testimonial->id, 'table' => 'testimonials']) }}"
                                                class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                                        @else
                                            <a href="{{ route('admin.active', ['id' => $testimonial->id, 'table' => 'testimonials']) }}"
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
