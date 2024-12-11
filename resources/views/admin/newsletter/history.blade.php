@extends('admin.layouts.app')
@section('content')
<br>
<br>

<div class="panel ">
	<div class="card-header">
		<h2 class="card-title">Email History</h2>

	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="card-body">

<table id="example2" class="table table-reponsive table-striped">
   <thead>
       <th>#</th>
       <th>Email</th>
       <th>Title</th>
       <th>Sent On</th>
       <th>Action</th>


   </thead>
   <tbody>
       @foreach ($email as $item)

       <tr>
           <td>{{$loop->iteration}}</td>
  

   <td>{{$item->title}}</td>
   <td>{!! $item->email !!}
</td>

   <td>{{carbon\carbon::parse($item->created_at)->format('d F Y')}}</td>
<td>

</a>



<a href="{{route('admin.newsletters.show',['id'=>$item->id])}}"><i class="fa fa-eye btn-primary btn" title="View Email Detail"></i>
</a>

</td>


       </tr>
       @endforeach

</table>
</div>
   </div>

@endsection
