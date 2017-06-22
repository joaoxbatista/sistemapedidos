@extends('template.dashboard')
@section('title') Dashboard | Cliente | Editar @endsection
@section('content')
	
				<h3>Dashboard - Cliente - Editar</h3>
			
				<a href="/dashboard/products/" class="btn btn-default">Voltar</a><br><br>


				{{ Form::open(['method' => 'post', 'route' => 'products.update'])}}
					<div class="form-group">
						{{ Form::label('name', 'Nome') }}
						{{ Form::text('name', $product->name, ['class' => 'form-control', 'required' => true]) }}
					</div>

					<div class="form-group">
						{{ Form::label('unit_price', 'Preço unitário') }}
						{{ Form::text('unit_price', $product->unit_price, ['class' => 'form-control', 'required' => true]) }}
					</div>

					<div class="form-group">
						{{ Form::label('weight', 'Peso') }}
						{{ Form::text('weight', $product->weight, ['class' => 'form-control', 'required' => true]) }}
					</div>

					<div class="form-group">
						{{ Form::label('desc', 'Descrição') }}
						{{ Form::textarea('desc', $product->desc, ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('provider_id', 'Fornecedor') }}
						{{ Form::select('provider_id', $providers , $product->provider_id, ['class' => 'form-control']) }}
					</div>

					{{ Form::hidden('id', $product->id)}}
					{{ Form::submit('Save', ['class' => 'btn btn-success'])}}
				{{ Form::close()}}

@endsection