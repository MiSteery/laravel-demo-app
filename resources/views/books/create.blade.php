@extends('books.layout.main')
@section('content')
{!! Form::open(array('url' =>'book','class'=>'myform', 'files'=>true))!!}
  

  @if($errors->all()) 
    <div class="alert alert-danger"> 
    @foreach($errors->all() as $error)
      <p>{!!$error!!}</p>
    @endforeach
    </div>
  @endif
  
  <div class="form-group">
    <label for="exampleInputEmail1">Book Title</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Author</label>
    <input type="text" id="author" name="author">
 
  </div>

   <div class="form-group">
    <label for="exampleInputFile">Image</label>
    <input type="file" id="image" name="image">
 
  </div>

   <div class="form-group">
    <label for="exampleInputFile">ISBN</label>
    <input type="text" id="isbn" name="isbn">
 
  </div>
 
  <button type="submit" class="btn btn-default">Submit</button>
{!! Form::close()!!}
@endsection