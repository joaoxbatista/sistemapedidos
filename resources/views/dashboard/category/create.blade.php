@extends('templates.admin-dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<a href="{{ route('admin-dashboard.products') }}" class="btn btn-default">Voltar</a><br><br>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Novo Categoria</h4>
	</div>

	<div class="panel-body">
		{{ Form::open(['method' => 'post', 'route' => 'admin-dashboard.categories.store'])}}
		<div class="row">
			<div class="form-group col-md-4">
				{{ Form::label('name', 'Nome') }}
				{{ Form::text('name', '', ['class' => 'form-control', 'required' => true]) }}
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-12">
				{{ Form::label('desc', 'Descrição') }}
				{{ Form::textarea('desc', '', ['class' => 'form-control']) }}
			</div>
		</div>

		{{ Form::hidden('user_id', Auth::user()->id )}}
		{{ Form::submit('Salvar', ['class' => 'btn btn-success'])}}
		{{ Form::close()}}

	</div>
</div>
@endsection

