@extends('layouts.default')
@section('content')

<h1>Add New Post</h1>
<hr/>
<!-- <form action="" method="" enctype="multipart/form-data"></form>
 -->{!! Form::open(['action'=>'PostController@store','method'=>'POST','files'=>true]) !!}

<div class="form-group">
	{{Form::label('Title')}}
	{{Form::text('title', '', ['placeholder'=>'Enter Post Title','class'=>'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('Body')}}
	{{Form::textarea('body', '', ['placeholder'=>'Enter Post Body','class'=>'form-control ckeditor'])}}
</div>

<div class="form-group">
	{{Form::label('Featured Image')}}
	{{Form::file('photo', ['placeholder'=>'Select Featured Image','class'=>'form-control'])}}
</div>

<div class="form-group pull-right">
	{{ Form::submit('Save', ['class'=>'btn btn-info']) }}
</div>

{!! Form::close() !!}
@endsection