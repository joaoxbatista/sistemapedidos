@extends('template.dashboard')
@section('title') Dashboard | Cliente | Editar @endsection
@section('content')

<h3>Dashboard - Cliente - Editar</h3>

	<a href="/dashboard/clients/" class="btn btn-default">Voltar</a>

	
	{{ Form::open(['method' => 'post', 'route' => 'clients.update'])}}
	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', $client->name, ['class' => 'form-control', 'required' => true]) }}
	</div>

	<div class="form-group">
		{{ Form::label('cpf', 'CPF')}}
		{{ Form::text('cpf', $client->cpf, ['class' => 'form-control', 'required' => true]) }}
		
	</div>

	<div class="form-group">
		{{ Form::label('phone', 'Telefone')}}
		{{ Form::text('phone', $client->phone, ['class' => 'form-control', 'required' => true]) }}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'E-mail')}}
		{{ Form::text('email', $client->email, ['class' => 'form-control', 'required' => true]) }}
		
	</div>

	<div class="form-group">
		{{ Form::label('cep', 'CEP')}}
		{{ Form::text('cep', $client->cep, ['class' => 'form-control']) }}
		
	</div>

	<div class="form-group">
		{{ Form::label('street', 'Bairro')}}
		{{ Form::text('street', $client->street, ['class' => 'form-control']) }}
		
	</div>


	<div class="form-group">
		{{ Form::label('district', 'Rua')}}
		{{ Form::text('district', $client->district, ['class' => 'form-control']) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('city', 'Cidade')}}
		{{ Form::text('city', $client->city, ['class' => 'form-control', 'required' => true]) }}
	</div>

	<div class="form-group">
		{{ Form::label('state', 'Estado')}}
		{{ Form::text('state', $client->state, ['class' => 'form-control', 'required' => true]) }}
	</div>

	{{ Form::hidden('id', $client->id) }}

	{{ Form::submit('Save', ['class' => 'btn btn-success'])}}
	{{ Form::close()}}
	
	@endsection