@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

    <h3>Dashboard/Perfil</h3>
    <a href="{{ route('dashboard.home') }}" class="btn btn-default">Voltar</a><br><br>

    <p><strong>Nome:</strong> {{$user->name}}</p>
    <p><strong>E-mail:</strong> {{$user->email}}</p>
    <p><strong>Telefone:</strong> {{$user->phone}}</p>

@endsection