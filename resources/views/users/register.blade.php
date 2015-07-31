@extends('users.template')

@section('content')



    <div class="col-md-10">

        <h1>Isi data anda dengan benar</h1>

        {!! Form::open(['url'=>'account/create','method'=>'post']) !!}

        {!! Form::token() !!}

        <div class="form-group">
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'masukan nama anda']) !!}
        </div>

        <div class="form-group">
            {!! Form::text('username',null,['class'=>'form-control','placeholder'=>'masukan username anda']) !!}
        </div>

        <div class="form-group">
            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'masukan email anda']) !!}
        </div>

        <div class="form-group">
            {!! Form::password('password',['class'=>'form-control','placeholder'=>'masukan password anda']) !!}
        </div>

        <div class="form-group">
            {!! Form::password('password_again',['class'=>'form-control','placeholder'=>'ulangi password anda']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Simpan', ['class' =>'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}

        @include('users.partials.errorMessage')
    </div>


@endsection