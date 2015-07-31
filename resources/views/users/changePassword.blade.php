@extends('users.template')

@section('content')

    <h1>Ganti Password:</h1>
    {!! Form::open(['url'=>'account/changePassword']) !!}

    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('oldPassword',['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('newPassword',['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('newPasswordAgain',['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Simpan', ['class' =>'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection