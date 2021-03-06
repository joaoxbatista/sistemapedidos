@extends('template.simple')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('content')

<div id="seller-login">
    <div class="conatiner">
    <div class="col-md-4 col-md-offset-4" id="form-login">
        <h3>Área Vendedor</h3>
        {{ Form::open(['route' => 'seller.login']) }}
            <div class="form-group">
                <label for="">Insira seu e-mail</label>
                {{ Form::text('email', '', ['class' => 'form-control'])  }}
            </div>

            <div class="form-group">
                <label for="">Insira sua senha</label>
                {{ Form::password('password',['class' => 'form-control'])  }}
            </div>

            {{ Form::submit('Entrar', ['class' => 'btn btn-success']) }}
            <a href="{{ route('password.request') }}"> Esqueceu sua senha?</a>

        {{ Form::close() }}
    </div>
</div>
</div>
@endsection
