@extends('layouts.default')
@section('content')

  <h1>{!! $post->title  !!}</h1>
  <h1>{!! $post->body   !!}</h1>
  @if(!Auth::guest() && Auth::user()-> id == $post->user_id)
      <div class="clearfix">
      <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit Post</a>

      <div class="pull-right">
        {!!Form::open(['action'=>['PostController@destroy',$post->id],'method'=>'POST'])!!}
        {{Form::hidden('_method','DELETE')}}
        <button class="btn btn-danger" type="submit">Delete Post</button>
        {!!Form::close()!!}

      </div>
      </div>

  @endif
      <div>
      <img src="{{ asset('images/posts/'.$post->photo) }}" class="img-responsive"/>
      {!! $post->body !!}
      </div>

@endsection