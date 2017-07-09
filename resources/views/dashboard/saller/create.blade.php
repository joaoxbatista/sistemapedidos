@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

	<h3>Dashboard/Vendedor/Novo</h3>

	<a href="{{ route('sallers') }}" class="btn btn-default">Voltar</a><br><br>

	{{ Form::open(['method' => 'post', 'route' => 'sallers.store'])}}

	<h4>Informações do vendedor</h4>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('name', 'Nome')}}
			{{Form::text('name', '', ['class' => 'form-control'])}}
		</div>

		<div class="form-group col-md-4">
			{{Form::label('cpf', 'CPF')}}
			{{Form::text('cpf', '', ['class' => 'form-control'])}}
		</div>

		<div class="form-group col-md-4">
			{{Form::label('payment', 'Salário')}}
			{{Form::text('payment', '', ['class' => 'form-control'])}}
		</div>
	</div>

	<h4>Informações de acesso</h4>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('email', 'E-mail')}}
			{{Form::text('email', '', ['class' => 'form-control'])}}
		</div>

		<div class="form-group col-md-4">
			{{Form::label('password', 'Senha')}}
			{{Form::password('password', ['class' => 'form-control'])}}
		</div>

	</div>

	{{ Form::hidden('user_id', Auth::user()->id)}}
	{{ Form::submit('Salvar', ['class' => 'btn btn-success'])}}
	{{ Form::close()}}

@endsection