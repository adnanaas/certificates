@extends('layouts.default')
@section('content')


<form method="POST" action="/certificates" enctype="multipart/form-data"class="form-control">
  @csrf
  <h3> The First Program</h3>
  
  <label for="nameLabel">Name : </label>
  <input type="text" name="name" class="form-control" id="nameLabel">

  <label for="filenameLabel">FileName : </label>
  <input type="file" name="filename" class="form-control" id="filenameLabel">

  <label for="userIdLabel">User Id : </label>
  <input type name="user_id" class="form-control" id="userIdLabel">
  
  <input type="submit" value="Submit" class="btn btn-primary" >

</form>
@endsection