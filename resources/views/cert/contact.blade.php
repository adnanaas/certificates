@extends('layouts.default')
@section('content')
<h1>Contact Me</h1>

{!! Form::open(['action'=>'PagesController@dosend','method'=>'POST']) !!}

<div class="form-group">
	{{Form::label('name')}}
	{{Form::text('name', '', ['placeholder'=>'Enter Post name','class'=>'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('email')}}
	{{Form::text('email', '', ['placeholder'=>'Enter Post email','class'=>'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('Subject')}}
	{{Form::text('subject', '', ['placeholder'=>'Enter Post Subject','class'=>'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('Body')}}
	{{Form::textarea('body', '', ['placeholder'=>'Enter Post Body','class'=>'form-control'])}}
</div>

<div class="form-group pull-right">
	{{ Form::submit('Send Message CERT', ['class'=>'btn btn-info']) }}
</div>

{!! Form::close() !!}
@endsection