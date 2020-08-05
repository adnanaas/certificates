@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="btn-group pull-right">
                        <a href="posts/create" class="btn btn-default">
                            <i class="fas fa-plus"></i>New Post
                        </a>
                    </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Post Lists</h3>
                    <table class="table table-stripped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a></td>
                                    <td>
                                {!!Form::open(['action'=>['PostController@destroy',$post->id],'method'=>'POST'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                <button class="btn btn-danger" type="submit">Delete Post</button>
                                {!!Form::close()!!}
                                </td>

                                </tr>
                            @endforeach
                        </tbody>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
