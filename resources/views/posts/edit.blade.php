@extends('layouts.default')
@section('content')

<h1>Update Post </h1>
<hr/>
{!! Form::open(['action'=>['PostController@update', $post->id],'method'=>'POST']) !!}

	{{ Form::hidden('_method','PUT') }}

<div class="form-group">
	{{Form::label('Title')}}
	{{Form::text('title', $post->title, ['placeholder'=>'Enter Post Title','class'=>'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('Body')}}
	{{Form::textarea('body', $post->body, ['placeholder'=>'Enter Post Body','class'=>'form-control ckeditor'])}}
</div>

<div class="form-group pull-right">
	{{ Form::submit('Updata Post', ['class'=>'btn btn-info']) }}
</div>

{!! Form::close() !!}
@endsection