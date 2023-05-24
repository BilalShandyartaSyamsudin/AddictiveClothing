<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/admin.css') }}">
</head>
<body>
    <div class="container">
        <div class="sidebar">@include('pengelola.layouts.sidebar')</div>
        <div class="main">
            @yield('input')
            @yield('user')
            @yield('barang')
            @yield('edit-barang')
        </div>
    </div>
</body>
</html>