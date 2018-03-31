<!DOCTYPE html>
<html>
<head>
	<title>helli</title>
</head>
<body  >
	<h1>this isbproduct paege1</h1>
	<div class="flash-message">
	@foreach(['success','error','danger','alert'] as $msg)
		  @if( Session::has('alert-' . $msg) )
		  <p class="alert-{!!$msg!!}">
		  {!! Session::get('alert-danger' . $msg)!!}
		  </p>
		  @endif

	@endforeach
</div>
</body>
</html>