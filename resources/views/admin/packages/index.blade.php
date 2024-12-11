@extends('admin.layouts.app')
@section('content')
    <section class="container">
        <div class="card">
            <div class="card-body">

                <!-- /. -->

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="-title">Packages</h3>
                    </div>
                    <div> <a class="btn btn-primary" href="{{ route('admin.categories-packages.create') }}"><i
                                class="fa fa-plus"></i> Add Packages</a></div>

                </div>
                <!-- /.-header -->
                <div class="-body">
                    <table id="blog_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

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



@push('scripts')
    <script>
        $(document).ready(function() {

            var table = $('#blog_table').DataTable({
                processing: true,
                serverSide: true,
                asorting: [],
                ajax: "{{ url('admin/categories-packages') }}",
                columns: [{
                        data: 'thumbnail',
                        name: 'thumbnail'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        })
    </script>
@endpush
