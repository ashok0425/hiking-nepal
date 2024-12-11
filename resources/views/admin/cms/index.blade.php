@extends('admin.layouts.app') 
@section('content')
<div class="card">
	<div class="card-header with-border">
        
		<h2 class="card-title col-md-6">CMS Pages</h2>

		<a class="btn btn-primary col-md-2 offset-md-4" href="{{ route('admin.cms.create') }}"><i class="fa fa-plus"></i> Add Page</a>
	</div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-bordered table-striped-col">
                <thead>
                    <tr>
                        <th>Title</th>
                        {{-- <th>Content</th> --}}
                        <th>Page Type</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Title</th>
                        {{-- <th>Content</th> --}}
                        <th>Page Type</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($cms_pages as $page)
                    <tr>
                        <td><a href="">{{ $page->title }}</a></td>
                        {{-- <td>{{ str_limit(strip_tags($page->content), 50, '...') }}</td> --}}
                        <td>{!! $page->main_or_sub ? '<span class="badge bg-success f-s-12">Main</span>' : '<span class="badge bg-warning f-s-12">Sub Page</span>' !!}</td>
                        <td>
                            @if(!$page->main_or_sub)
                                <span class="badge bg-primary f-s-12">{{ $page->parent->title }}</span> <i class="fa fa-arrow-circle-right"></i>
                            @endif
                            <span class="badge bg-primary f-s-12">{{ $page->position }}</span>
                        </td>
                        <td>{!! $page->status ? '<span class="badge bg-success f-s-12">Active</span>' : '<span class="badge bg-danger f-s-12">Deactive</span>' !!}</td>
                        <td>
                        	<a href="{{ route('admin.cms.edit', $page->id) }}" class="btn btn-primary btn-sm "><i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.cms.delete', $page->id) }}" class="btn btn-danger btn-sm delete_row" id=""><i class="fa fa-trash"></i></a>

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

