@extends('template.dashboard')
@section('title') Dashboard | Cliente | Editar @endsection
@section('content')

	<a href="{{ route('products') }}" class="btn btn-default">Voltar</a><br><br>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Atualizar Produto</h4>
		</div>

		<div class="panel-body">
			{{ Form::open(['method' => 'post', 'route' => 'products.update', 'files' => true])}}
			<div class="row">
				<div class="form-group col-md-4">
					{{ Form::label('name', 'Nome') }}
					{{ Form::text('name', $product->name, ['class' => 'form-control', 'required' => true]) }}
				</div>
				<div class="form-group col-md-3">
					{{ Form::label('provider_id', 'Fornecedor') }}
					{{ Form::select('provider_id', $providers , $product->provider_id ,['class' => 'form-control']) }}
				</div>

				<div class="form-group col-md-3">
					{{ Form::label('unit_price', 'Preço unitário') }}
					{{ Form::text('unit_price', $product->unit_price, ['class' => 'form-control', 'required' => true]) }}
				</div>

				<div class="form-group col-md-2">
					{{ Form::label('weight', 'Peso') }}
					{{ Form::text('weight', $product->weight, ['class' => 'form-control', 'required' => true]) }}
				</div>


			</div>

			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-2">
					@if(!is_null($product->image))
						<img width="120px" src="{{ asset('uploads/images/products/'.$product->image) }}" alt="{{ $product->name }}">
					@endif
				</div>
¹
				<div class="form-group col-md-6">
					{{ Form::label('file', 'Fotografia') }}
					{{ Form::file('file', ['class' => 'form-file']) }}
				</div>

			</div>

			<div class="row">
				<div class="form-group col-md-12">
					{{ Form::label('desc', 'Descrição') }}
					{{ Form::textarea('desc', $product->desc, ['class' => 'form-control']) }}
				</div>
			</div>

			{{ Form::hidden('id', $product->id)}}
			{{ Form::submit('Atualizar', ['class' => 'btn btn-success'])}}
			{{ Form::close()}}

		</div>
	</div>

@endsection