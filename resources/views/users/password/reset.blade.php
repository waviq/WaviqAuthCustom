@extends('users.template')

@section('content')

    <h2>Reset Your Password</h2>

    {!! Form::open(['url'=>'account/reset-password']) !!}

            <!--Judul form input-->
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Reset', ['class' =>'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

@endsection