@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
<a href="{{ route('categories.create') }}" class="btn btn-success">Nova Categoria</a>
<a href="{{ route('providers.create') }}" class="btn btn-success">Novo Fornecedor</a><br><br>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Novo Produto</h4>
	</div>

	<div class="panel-body">
		{{ Form::open(['method' => 'post', 'route' => 'products.store', 'files' => true])}}
		<div class="row">
			<div class="form-group col-md-4">
				{{ Form::label('name', 'Nome') }}
				{{ Form::text('name', '', ['class' => 'form-control', 'required' => true]) }}
			</div>
			<div class="form-group col-md-3">
				{{ Form::label('category_id', 'Categoria') }}
				{{ Form::select('category_id', $categories , [] ,['class' => 'form-control']) }}

			</div>
			
			<div class="form-group col-md-3">
				{{ Form::label('provider_id', 'Fornecedor') }}
				{{ Form::select('provider_id', $providers , [] ,['class' => 'form-control']) }}
			</div>

		</div>

		<div class="row">
			
			<div class="form-group col-md-2">
				{{ Form::label('unit_price', 'Preço unitário') }}
				{{ Form::text('unit_price', '', ['class' => 'form-control', 'required' => true]) }}
			</div>

			<div class="form-group col-md-2">
				{{ Form::label('weight', 'Peso') }}
				{{ Form::text('weight', '', ['class' => 'form-control']) }}
			</div>

			<div class="form-group col-md-2">
				{{ Form::label('quantity', 'Quantidade') }}
				{{ Form::text('quantity', '', ['class' => 'form-control']) }}
			</div>

			<div class="form-group col-md-6">
				{{ Form::label('file', 'Fotografia') }}
				{{ Form::file('file', ['class' => 'form-file']) }}
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

