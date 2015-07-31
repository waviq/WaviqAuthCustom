@extends('users.template')

@section('content')

    <h1>Welcome {{Auth::user()->name}}</h1>
    <h2><a href="{{url(action('UserController@getChangePassword'))}}">Ganti Password</a></h2>
    <h2><a href="{{url(action('UserController@getSignOut'))}}">Logout</a></h2>

@endsection