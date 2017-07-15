@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<a href="{{ route('clients') }}" class="btn btn-default">Voltar</a><br><br>
<div class="well">
	<p><strong>Nome: </strong>{{ $client->name }}</p>
	<p><strong>CPF: </strong>{{ $client->cpf }}</p>
	<p><strong>Limite de Crédito: </strong>R${{ $client->limit_credit }}</p>
	<p><strong>CNPJ: </strong>{{ $client->cnpj }}</p>
	<p><strong>Telefone: </strong>{{ $client->phone }}</p>
	<p><strong>E-mail: </strong>{{ $client->email }}</p>
	<p><strong>CEP:</strong>{{ $client->cep }}</p>
	<p><strong>Bairro: </strong>{{ $client->street }}</p>
	<p><strong>Rua: </strong>{{ $client->district }}</p>
	<p><strong>Cidade: </strong>{{ $client->city }}</p>
	<p><strong>Estado: </strong>{{ $client->state }}</p>
</div>


@endsection