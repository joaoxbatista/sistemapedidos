@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<a href="{{ route('clients') }}" class="btn btn-default">Voltar</a><br><br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações do Cliente</h4>
	</div>

	<div class="panel-body">
		<p><strong>Nome: </strong>{{ $client->name }}</p>

		<p><strong>Limite de Crédito: </strong>R${{ $client->limit_credit }}</p>
		@if($client->cnjp != null)
			<p><strong>CNPJ: </strong>{{ $client->cnpj }}</p>
		@else
			<p><strong>CPF: </strong>{{ $client->cpf }}</p>
		@endif

		<p><strong>Telefone: </strong>{{ $client->phone }}</p>
		<p><strong>E-mail: </strong>{{ $client->email }}</p>
		<p><strong>CEP: </strong>{{ $client->cep }}</p>
		<p><strong>Bairro: </strong>{{ $client->street }}</p>
		<p><strong>Rua: </strong>{{ $client->district }}</p>
		<p><strong>Cidade: </strong>{{ $client->city }}</p>
		<p><strong>Estado: </strong>{{ $client->state }}</p>
	</div>
</div>

<div class="panel panel-defaul">
	<div class="panel-heading">
		<h4>Compras</h4>
	</div>

	<div class="panel-body">
		{{ $client->orders }}
	</div>
</div>
@endsection