<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--     <link rel="stylesheet" href="{{asset('css/app.css')}}">
 -->    
    <link rel="stylesheet" href="{{asset('css/extre.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.5.0/flatly/bootstrap.min.css">

    
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
	@include('codes.navbar')
  @include('codes.flash')
	<div class="container">

	@yield('content')
	</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>