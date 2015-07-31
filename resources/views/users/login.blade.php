@extends('users.template')

@section('content')

    <div class="col-md-5">


        <h1>Login page</h1>

        {!! Form::open(['route'=>'login-post']) !!}
        {!! csrf_field() !!}

        <!--Judul form input-->
        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>

        <!--Judul form input-->
        <div class="form-group">
            {!! Form::label('password','Password:') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Login', ['class' =>'btn btn-primary form-control']) !!}
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label for="remember">
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>
        </div>


        {!! Form::close() !!}

    </div>

@endsection