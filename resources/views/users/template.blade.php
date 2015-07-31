<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authentification</title>

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/sweetalert/dist/sweetalert.css')}}">
</head>
<body>


@yield('content')


<script type="text/javascript" src="{{asset('assets/javascript/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/javascript/JQuery.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert/dist/sweetalert.min.js')}}"></script>
@include('sweet::alert')

</body>
</html>