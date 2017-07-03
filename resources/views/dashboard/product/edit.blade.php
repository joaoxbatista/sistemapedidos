@extends('template.dashboard')
@section('title') Dashboard | Cliente | Editar @endsection
@section('content')

	<h3>Dashboard - Cliente - Editar</h3>

	<a href="{{ route('products') }}" class="btn btn-default">Voltar</a><br><br>

	{{ Form::open(['method' => 'post', 'route' => 'products.update', 'files' => true])}}

	<div class="row">
		<div class="form-group col-md-4">
			{{ Form::label('name', 'Nome') }}
			{{ Form::text('name', $product->name, ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-2">
			{{ Form::label('unit_price', 'Preço unitário') }}
			{{ Form::text('unit_price', $product->unit_price, ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-2">
			{{ Form::label('weight', 'Peso') }}
			{{ Form::text('weight', $product->weight, ['class' => 'form-control', 'required' => true]) }}
		</div>

		<div class="form-group col-md-2">
			{{ Form::label('provider_id', 'Fornecedor') }}
			{{ Form::select('provider_id', $providers , $product->provider_id, ['class' => 'form-control']) }}
		</div>
	</div>

	<div class="row">
		<div class="form-goup col-md-4">
			<div class="row">
				<div class="form-group col-md-6">
					{{ Form::file('file', ['class' => 'form-file']) }}
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-12">
			{{ Form::label('desc', 'Descrição') }}
			{{ Form::textarea('desc', $product->desc, ['class' => 'form-control']) }}
		</div>
	</div>

	{{ Form::hidden('id', $product->id)}}
	{{ Form::submit('Save', ['class' => 'btn btn-success'])}}
	{{ Form::close()}}

@endsection