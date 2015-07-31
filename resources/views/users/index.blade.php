@extends('users.template')

@section('content')

<h1><a href="{{URL::route('account-create')}}"> Create account</a></h1>
<h1><a href="{{url(action('UserController@postSignIn'))}}">Login</a></h1>

@endsection