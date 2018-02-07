@extends('template.dashboard')
@section('title') Dashboard | providere | Editar @endsection
@section('content')

	<h3>Dashboard/Fornecedores/Editar</h3>

	<a href="{{ route('providers') }}" class="btn btn-default">Voltar</a><br><br>

	{{ Form::open(['method' => 'post', 'route' => 'providers.update'])}}
	<div class="row">
		<div class="form-group col-md-4">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', $provider->name, ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-2">
			{{ Form::label('cnpj', 'CNPJ')}}
			{{ Form::text('cnpj', $provider->cnpj, ['class' => 'form-control', 'required' => true]) }}

		</div>

		<div class="form-group col-md-2">
			{{ Form::label('phone', 'Telefone')}}
			{{ Form::text('phone', $provider->phone, ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-4">
			{{ Form::label('email', 'E-mail')}}
			{{ Form::text('email', $provider->email, ['class' => 'form-control', 'required' => true]) }}

		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-2">
			{{ Form::label('state', 'Estado')}}
			{{ Form::text('state', $provider->state, ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-2">
			{{ Form::label('city', 'Cidade')}}
			{{ Form::text('city', $provider->city, ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-4">
			{{ Form::label('street', 'Bairro')}}
			{{ Form::text('street', $provider->street, ['class' => 'form-control']) }}

		</div>

		<div class="form-group col-md-2">
			{{ Form::label('district', 'Rua')}}
			{{ Form::text('district', $provider->district, ['class' => 'form-control']) }}
		</div>

		<div class="form-group col-md-2">
			{{ Form::label('cep', 'CEP')}}
			{{ Form::text('cep', $provider->cep, ['class' => 'form-control']) }}
		</div>
	</div>


	{{ Form::hidden('id', $provider->id) }}

	{{ Form::submit('Salvar', ['class' => 'btn btn-success'])}}
	{{ Form::close()}}

@endsection