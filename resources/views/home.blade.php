<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>home Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4\
/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4\
/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.mi\
n.js"></script>
        </head>
            <body>
            @extends('master')
@section('title', 'Home')
@section('content')
<div class="container">
<div class="row banner">
<div class="col-md-12">
<h1 class="text-center margin-top-100 editContent">
Learning Laravel 5
</h1>
<h3 class="text-center margin-top-100 editContent">Building Practical Applications</h3>
<div class="text-center">
<img src="http://learninglaravel.net/img/LearningLaravel5_cover0.png" width="302" height="391" alt="">
</div>
</div>
</div>
</div>
@endsection
</body>
</html>