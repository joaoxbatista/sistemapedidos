@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
	<a href="{{ route('sallers') }}" class="btn btn-default">Voltar</a><br><br>

	<div class="panel panel-danger">
		<div class="panel-heading">
			<h4>Apagar registro</h4>
		</div>

		<div class="panel-body">
			<p>Tem certeza que deseja remover o vendedor com as seguinte informações ?</p>
			<p><strong>Nome: </strong>{{ $saller->name }}</p>
			<p><strong>CPF: </strong>{{ $saller->cpf }}</p>
			{{ Form::open(['method' => 'post', 'route' => 'sallers.destroy'])}}
			{{ Form::hidden('id', $saller->id)}}
			{{ Form::submit('Deletear', ['class' => 'btn btn-danger'])}}
			{{ Form::close()}}
		</div>
	</div>


@endsection