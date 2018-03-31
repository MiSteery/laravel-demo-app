@extends('books.layout.main')
@section('content')
<h2>Book List</h2>
<a 	href="{!!url('book/create')!!}">Add Book</a>
<hr>
<div class="flash-message">
	@foreach(['success','error','danger','alert'] as $msg)
		  @if( Session::has('alert-' . $msg) )
		  <p class="alert-{!!$msg!!}">
		  {!! Session::get('alert-' . $msg)!!}
		  </p>
		  @endif

	@endforeach
</div>
<table class="table table-striped">
	<tr>
		<td>S.N</td>
		<td>Title</td>
		<td>Description</td>
		<td>Author</td>
		<td>Isbn</td>
		<td>Action</td>
	</tr>
	@foreach($books as $key=>$book)
		<tr>
			<td>{!!$key+1!!}</td>
			<td>{!!$book->title!!}</td>
			<td>{!!$book->description!!}</td>
			<td>{!!$book->author!!}</td>
			<td>{!!$book->isbn!!}</td>
			<td>
				<a class="btn btn-primary" href="{!!url('book/'.$book->id.'/edit')!!}">Edit</a>
				<a class="btn btn-danger" onclick="deleteBook({!!$book->id!!})"> Delete</a>
			</td>
		</tr>
	@endforeach

</table>

{!!Form::open(array('url'=>'book','method'=>'delete','id'=>'frmbook'))!!}
{!!Form::close()!!}
<script type="text/javascript">
	function deleteBook(id){
	  var conf= confirm('Are you sure you want to delete this?');
	  if(conf){
	  		var url = $('#frmbook').attr('action');
	  		url= url+'/'+id;
	  		$('#frmbook').attr('action',url);
	  		$('#frmbook').submit();
	  }else{
	  	return false;
	  }
	}
</script>

@endsection