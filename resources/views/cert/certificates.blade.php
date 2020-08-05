@extends('layouts.default')
@section('content')
@foreach($certificates as $certificate)
  @if($certificates->count() > 0 )
    <h3><label>ID : </label>  {{$certificate->id}}
    <label>FileName : </label>  {{$certificate->filename}}
    <label>User_id : </label>  {{$certificate->user_id}}</h3>
    <a href="/certificates/{{$certificate->id}}/edit">Edit</a>
    <form method="POST" action='/certificate/{{$certificate->id}}'>
    	@csrf
    	@method('DELETE')
    <input type="submit" name="delete" class="btn btn-primary" value="Delete">
    </form>
  @else
    <div class="alert alert-info">
      <strong>Opps</strong> No Certificates
    </div>
  @endif
@endforeach

{{ $certificates->links() }}

@endsection
