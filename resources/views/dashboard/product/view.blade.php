@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<a href="/dashboard/products/" class="btn btn-default">Voltar</a><br><br>

<div class="container">
	<div class="col-md-12">
		<p><strong>Nome: </strong>{{ $product->name }}</p>
		<img src="{{ asset('uploads/images/products/'.$product->image) }}" alt="{{ $product->name }}">
		<p><strong>Preço unitário: </strong>{{ $product->unit_price }}</p>
		<p><strong>Validade: </strong>{{ $product->expiration }}</p>
		<p><strong>Peso: </strong>{{ $product->weight }}Kg</p>
		<p><strong>Descrição: </strong>{{ $product->desc }}</p>
		<p><strong>Fornecedor: </strong>{{ $product->provider->name }}</p>
	</div>
</div>




@endsection