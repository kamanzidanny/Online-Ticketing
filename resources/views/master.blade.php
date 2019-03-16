<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Include roboto.css to use the Roboto web font, material.css to include \
the theme and ripples.css to style the ripple effect -->
<link href="/css/roboto.min.css" rel="stylesheet">
<link href="/css/material.min.css" rel="stylesheet">
<link href="/css/ripples.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
    @include('navbar')
    @yield('content')
</body>
</html>