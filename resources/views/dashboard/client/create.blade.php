@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')


<h3>Dashboard - Cliente - Create</h3>

<a href="/dashboard/clients/" class="btn btn-default">Voltar</a><br><br>

{{ Form::open(['method' => 'post', 'route' => 'clients.store'])}}
	
	<h3>Documentos</h3>
	<p>Área reservada para documentos e informações importantes.</p>
	<div class="row">
		
		<div class="form-group col-md-4">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', '', ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-4">
			{{ Form::label('cpf', 'CPF')}}
			{{ Form::text('cpf', '', ['class' => 'form-control', 'required' => true]) }}

		</div>

		
	</div>

	<h3>Contato</h3>
	<p>Área reservada para informações relativas a formas de contato.</p>
	<div class="row">
		<div class="form-group col-md-4">
			{{ Form::label('phone', 'Telefone')}}
			{{ Form::text('phone', '', ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-4">
			{{ Form::label('email', 'E-mail')}}
			{{ Form::text('email', '', ['class' => 'form-control', 'required' => true]) }}

		</div>
	</div>

	<h3>Endereço</h3>
	<p>Área reservada para informações relativas ao endereço.</p>
	<div class="row">
		<div class="form-group col-md-2">
			{{ Form::label('cep', 'CEP')}}
			{{ Form::text('cep', '', ['class' => 'form-control']) }}

		</div>

		<div class="form-group col-md-3">
			{{ Form::label('street', 'Bairro')}}
			{{ Form::text('street', '', ['class' => 'form-control']) }}

		</div>


		<div class="form-group col-md-3">
			{{ Form::label('district', 'Rua')}}
			{{ Form::text('district', '', ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			{{ Form::label('city', 'Cidade')}}
			{{ Form::text('city', '', ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-4">
			{{ Form::label('state', 'Estado')}}
			{{ Form::text('state', '', ['class' => 'form-control', 'required' => true]) }}
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-4">
			{{ Form::hidden('user_id', Auth::user()->id )}}
			{{ Form::submit('Salvar', ['class' => 'btn btn-success'])}}
		</div>
	</div>
{{ Form::close()}}

@endsection