@extends('layouts.default')
@section('content')


  @if($posts->count() > 0 )

    @foreach($posts as $post)
        <label>ID : </label>  {{$post->id}}
        <label>Title : </label>    <a href="/posts/{{$post->slug}}">
        {{$post->title}}</a>
        <label>Body : </label>
        <div class="panel-body">
            {{Str::limit(Strip_tags($post->body),40)}}
        </div>
    <!--     <a href="/posts/{{$post->id}}/edit">Edit</a>
     -->    <form method="POST" action='/posts/{{$post->id}}'>
        	@csrf
        	@method('DELETE')
        <input type="submit" name="delete" class="btn btn-primary" value="Delete">
        <div class="panel-footer">
          <span class="label label-info">
           <i class="fas fa-calender"> {{ $post->created_at }}</i>
          </span>
           <span class="label label-success">
           { $post->user->name }
           </span>
        </div>
        </form>
    @endforeach
  @else
    <div class="alert alert-info">
      <strong>Opps</strong> No posts
    </div>
  @endif


{{ $posts->links() }}

@endsection
