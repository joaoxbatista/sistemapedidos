@extends('template.dashboard')
@section('title') Dashboard | Cliente | Editar @endsection
@section('content')

<a href="{{ route('clients') }}" class="btn btn-default">Voltar</a><br><br>

{{ Form::open(['method' => 'post', 'route' => 'clients.update'])}}

<!-- Informações Pessoais -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações pessoais</h4>
	</div>

	<div class="panel-body">
		<div class="form-group col-md-4">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', $client->name, ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-3">
			{{ Form::label('cpf', 'CPF')}}
			{{ Form::text('cpf', $client->cpf, ['class' => 'form-control', 'required' => true]) }}

		</div>

		<div class="form-group col-md-3">
			{{Form::label('cnpj', 'CNPJ')}}
			{{Form::text('cnpj', $client->cnpj, ['class' => 'form-control'])}}
		</div>

		<div class="form-group col-md-2">
			{{Form::label('limit_credit', 'Limite de crédito')}}
			{{Form::text('limit_credit', $client->limit_credit, ['class' => 'form-control'])}}
		</div>
	</div>
</div><!--/ Informações Pessoais -->

<!-- Informações de Contato -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações de contato</h4>
	</div>

	<div class="panel-body">
		<div class="form-group col-md-4">
			{{ Form::label('phone', 'Telefone')}}
			{{ Form::text('phone', $client->phone, ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-4">
			{{ Form::label('email', 'E-mail')}}
			{{ Form::text('email', $client->email, ['class' => 'form-control', 'required' => true]) }}

		</div>
	</div>
</div><!--/ Informações de Contato -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações de localidade</h4>
	</div>
	<div class="panel-body">

		<div class="form-group col-md-4">
			{{ Form::label('state', 'Estado')}}
			{{ Form::text('state', $client->state, ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-4">
			{{ Form::label('city', 'Cidade')}}
			{{ Form::text('city', $client->city, ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-4">
			{{ Form::label('district', 'Bairro')}}
			{{ Form::text('district', $client->street, ['class' => 'form-control']) }}
		</div>

		<div class="form-group col-md-4">
			{{ Form::label('street', 'Rua')}}
			{{ Form::text('street', $client->street, ['class' => 'form-control']) }}

		</div>

		<div class="form-group col-md-2">
			{{ Form::label('cep', 'CEP')}}
			{{ Form::text('cep', $client->cep, ['class' => 'form-control']) }}
		</div>

	</div>
</div>

{{ Form::hidden('id', $client->id) }}
{{ Form::submit('Atualizar', ['class' => 'btn btn-success'])}}

{{ Form::close()}}

@endsection