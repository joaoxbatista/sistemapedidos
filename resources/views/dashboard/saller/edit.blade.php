@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

	<h3>Dashboard/Vendedor/Editar</h3>

	<a href="{{ route('sallers') }}" class="btn btn-default">Voltar</a><br><br>

	{{ Form::open(['method' => 'post', 'route' => 'sallers.update'])}}

	<h4>Informações do vendedor</h4>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('name', 'Nome')}}
			{{Form::text('name', $saller->name, ['class' => 'form-control'])}}
		</div>

		<div class="form-group col-md-4">
			{{Form::label('cpf', 'CPF')}}
			{{Form::text('cpf', $saller->cpf, ['class' => 'form-control'])}}
		</div>

		<div class="form-group col-md-4">
			{{Form::label('payment', 'Salário')}}
			{{Form::text('payment', $saller->payment, ['class' => 'form-control'])}}
		</div>
	</div>

	<h4>Informações de acesso</h4>
	<div class="row">
		<div class="form-group col-md-4">
			{{Form::label('email', 'E-mail')}}
			{{Form::text('email', $saller->email, ['class' => 'form-control'])}}
		</div>


	</div>

	{{ Form::hidden('id', $saller->id)}}
	{{ Form::submit('Atualizar', ['class' => 'btn btn-success'])}}
	{{ Form::close()}}

@endsection