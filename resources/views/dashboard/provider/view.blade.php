@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<a href="{{ route('providers') }}" class="btn btn-default">Voltar</a><br><br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Iformações do Fornecedor</h4>
	</div>

	<div class="panel-body">
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
</div>
@endsection
