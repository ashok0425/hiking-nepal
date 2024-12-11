@extends('admin.layouts.app') 
@section('content')
<div class="card">
	<div class="card-header">
		<h2 class="card-title">Newsletter</h2>

	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="card-body">

        <div class="table-responsive">
            <form action="{{ route('admin.newsletters.create') }}" method="GET">
            <input type="submit" value="Send Email to selected Subscriber" class="btn btn-primary">
<br>
<br>

            <table id="example2" class="table table-bordered table-striped-col">
                <thead>
                    <tr>
                        <th> <input type="checkbox" class="p-4" id="ischeck"><br> All</th>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Delete</th>
                     
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($newsletters as $key=>$newsletter)
                    <tr>
                        <td><input type="checkbox"  name="email[]" class="check" value="{{ $newsletter->email }}"></td>

                        <td>{{ ++$key }}</td>
                        <td>{{ $newsletter->email }}</td>
                        <td>
                           <a href="{{ route('admin.newsletters.delete',$newsletter->id) }}" id="delete_row" class="btn btn-danger btn-sm delete_row"><i class="fa fa-trash"></i></a>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </form>
            </table>
        </div>
    </div>
</div>
<!-- panel -->
@endsection

@push('scripts')

<script>
    $('#ischeck').click(function(e){

    if ($(this).prop('checked')){

    $('.check').attr('checked','checked')
  }else{
    $('.check').removeAttr('checked','fg')

  }
})

$('.check').click(function(){
    if ($(this).prop('checked')){
        $(this).attr('checked','fg')
    $(this).siblings().attr('checked','gf')
    $('#ischecked').attr('checked','gf')

  }else{
    
  }
})
</script>
@endpush

