@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
	<a href="{{ route('sellers') }}" class="btn btn-default">Voltar</a><br><br>

	<div class="panel panel-danger">
		<div class="panel-heading">
			<h4>Apagar registro</h4>
		</div>

		<div class="panel-body">
			<p>Tem certeza que deseja remover o vendedor com as seguinte informações ?</p>
			<p><strong>Nome: </strong>{{ $seller->name }}</p>
			<p><strong>CPF: </strong>{{ $seller->cpf }}</p>
			{{ Form::open(['method' => 'post', 'route' => 'sellers.destroy'])}}
			{{ Form::hidden('id', $seller->id)}}
			{{ Form::submit('Deletear', ['class' => 'btn btn-danger'])}}
			{{ Form::close()}}
		</div>
	</div>


@endsection