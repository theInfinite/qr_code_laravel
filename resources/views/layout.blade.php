<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>QR Code Demo</title>
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">

</head>

<body>

@yield('content')

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>

</body>

</html>