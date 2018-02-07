@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
	<a href="{{ route('providers') }}" class="btn btn-default">Voltar</a><br><br>

	<div class="panel panel-danger">
		<div class="panel-heading">
			<h4>Apagar registro</h4>
		</div>

		<div class="panel-body">
			<p>Tem certeza que deseja remover o vendedor com as seguinte informações ?</p>

			<p><strong>Nome: </strong>{{ $provider->name }}</p>
			<p><strong>CPF: </strong>{{ $provider->cnpj }}</p>
			<p><strong>Telefone: </strong>{{ $provider->phone }}</p>
			<p><strong>E-mail: </strong>{{ $provider->email }}</p>
			<p><strong>CEP:</strong>{{ $provider->cep }}</p>
			<p><strong>Bairro: </strong>{{ $provider->street }}</p>
			<p><strong>Rua: </strong>{{ $provider->district }}</p>
			<p><strong>Cidade: </strong>{{ $provider->city }}</p>
			<p><strong>Estado: </strong>{{ $provider->state }}</p>

			{{ Form::open(['method' => 'post', 'route' => 'providers.destroy'])}}
			{{ Form::hidden('id', $provider->id)}}
			{{ Form::submit('Deletear', ['class' => 'btn btn-danger'])}}
			{{ Form::close()}}
		</div>
	</div>


@endsection