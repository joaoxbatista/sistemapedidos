@extends('template.simple')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('content')

<div class="conatiner">
    <div class="col-md-4 col-md-offset-4" id="form-login">
        <h3>Área administrativa</h3>
        {{ Form::open(['route' => 'login']) }}
            <div class="form-group">
                <label for="">Insira seu e-mail</label>
                {{ Form::text('email', '', ['placeholder' => 'exemple@exemple.com', 'class' => 'form-control'])  }}
            </div>

            <div class="form-group">
                <label for="">Insira sua senha</label>
                {{ Form::password('password',['placeholder' => '******', 'class' => 'form-control'])  }}
            </div>

            {{ Form::submit('Entrar', ['class' => 'btn btn-success']) }}
            <a href="{{ route('password.request') }}"> Esqueceu sua senha?</a>

        {{ Form::close() }}
    </div>
</div>
@endsection
