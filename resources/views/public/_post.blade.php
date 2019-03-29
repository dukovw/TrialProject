<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="col-md-12">
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>