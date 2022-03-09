<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ config('app.name')}} @yield('title')</title>
    <link href="{{ asset('back/dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('back/dist/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('back/dist/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('back/dist/css/demo.min.css') }}" rel="stylesheet"/>
    @toastr_css
    @yield('css')
</head>
<body class="antialiased border-top-wide border-primary d-flex flex-column">

@yield('content')

<script src="{{ asset('back/dist/js/tabler.min.js') }}"></script>
<script src="{{ asset('jquery.min.js') }}"></script>
@toastr_js
@toastr_render
@yield('js')
</body>
</html>
