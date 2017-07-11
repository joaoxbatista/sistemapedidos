@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Fornecedores - View</h3>
<a href="/dashboard/providers/" class="btn btn-default">Voltar</a><br><br>
<div class="well">
	<h4>Contato</h4>
	<p><strong>Nome: </strong>{{ $provider->name }}</p>
	<p><strong>CPF: </strong>{{ $provider->cnpj }}</p>
	<p><strong>Telefone: </strong>{{ $provider->phone }}</p>
	<p><strong>E-mail: </strong>{{ $provider->email }}</p>
	<p><strong>CEP:</strong>{{ $provider->cep }}</p>
	<p><strong>Bairro: </strong>{{ $provider->street }}</p>
	<p><strong>Rua: </strong>{{ $provider->district }}</p>
	<p><strong>Cidade: </strong>{{ $provider->city }}</p>
	<p><strong>Estado: </strong>{{ $provider->state }}</p>

</div>

@endsection