@extends('admin.layouts.app')
@section('content')
    <section class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="-title">Package Country Data</h3>
                    </div>
                    <div> <a class="btn btn-primary" href="{{ route('admin.package.country.create',['package_id'=>$package_id]) }}"><i class="fa fa-plus"></i> Add
                            Detail</a></div>

                </div>
                <!-- /.-header -->
                <div class="-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Package</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="sortable-posts">
                            @foreach ($packages as $package)
                                <tr id="{{ $package->id }}">
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $package->cname }}</td>
                                    <td>{{ $package->pname }}</td>

                                    <td>{!! $package->status
                                        ? '<span class="badge bg-success">Active</span>'
                                        : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                                    <td>
                                        <a href="{{ route('admin.package.country.edit', $package->id) }}"
                                            class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                                        </a>

                               
                                        @if ($package->status == 1)
                                            <a href="{{ route('admin.deactive', ['id' => $package->id, 'table' => 'country_package']) }}"
                                                class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>
                                        @else
                                            <a href="{{ route('admin.active', ['id' => $package->id, 'table' => 'country_package']) }}"
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
