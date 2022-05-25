<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peduli Diri</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.15.4-web/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body

@if ($nama == 'login' || $nama == 'register' || $nama == 'homes')
    class="body-background"
@endif
>

    @include('sweetalert::alert')

    @if ($nama === 'home' || $nama === 'perjalanan')
        @include('partials.navbar')

        @yield('pages')
    @else
        @yield('login_register')
    @endif

</body>

<script src="{{ asset('js/jquery.js') }}"></script>

<script src="{{ asset('plugins/fontawesome-free-5.15.4-web/js/all.js') }}"></script>

<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</html>