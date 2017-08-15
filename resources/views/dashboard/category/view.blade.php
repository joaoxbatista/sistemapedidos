@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<a href="{{ route('products') }}" class="btn btn-default">Voltar</a><br><br>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações do Produto</h4>
	</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-md-4">
				<img width="180px" src="{{ asset('uploads/images/products/'.$product->image) }}" alt="{{ $product->name }}">
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6">
						<h4>entrada de produtos</h4>
						{{ Form::open(['route' => 'products.add', 'method' => 'post']) }}
						{{ Form::hidden('id', $product->id) }}
						<div class="form-group">
							{{ Form::label('quantity', 'Quantidade') }}
							{{ Form::text('quantity', '',['class' => 'form-control']) }}
						</div>
						{{ Form::submit('Adicionar', ['class' => 'btn btn-success']) }}
						{{ Form::close() }}
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p><strong>Nome: </strong>{{ $product->name }}</p>
						<p><strong>Fornecedor: </strong>{{ $product->provider->name }}</p>
						<p><strong>Quantidade: </strong>{{ $product->quantity }}</p>
					</div>
					<div class="col-md-6">
						<p><strong>Preço unitário: </strong>{{ $product->unit_price }}</p>
						<p><strong>Peso: </strong>{{ $product->weight }}Kg</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p><strong>Descrição: </strong>{{ $product->desc }}</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>



@endsection