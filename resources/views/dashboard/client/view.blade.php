@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Cliente</h3>
<a href="/dashboard/clients/" class="btn btn-default">Voltar</a><br><br>
<div class="well">
	<h4>Contato</h4>
	<p><strong>Nome: </strong>{{ $client->name }}</p>
	<p><strong>CPF: </strong>{{ $client->cpf }}</p>
	<p><strong>Telefone: </strong>{{ $client->phone }}</p>
	<p><strong>E-mail: </strong>{{ $client->email }}</p>
	<p><strong>CEP:</strong>{{ $client->cep }}</p>
	<p><strong>Bairro: </strong>{{ $client->street }}</p>
	<p><strong>Rua: </strong>{{ $client->district }}</p>
	<p><strong>Cidade: </strong>{{ $client->city }}</p>
	<p><strong>Estado: </strong>{{ $client->state }}</p>

</div>

<div class="well">
	<h4>Informações Bancárias</h4>
</div>

<div class="well">
	<h4>Pedidos</h4>
</div>

@endsection