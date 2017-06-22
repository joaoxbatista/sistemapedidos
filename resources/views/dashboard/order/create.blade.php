@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Cliente - Create</h3>

<a href="/dashboard/orders/" class="btn btn-default">Voltar</a><br><br>


<div class="table-responsive">
	<table class="table table-bordered">

		<thead>
			<tr>
				<th>Nome</th>
				<th>Preço unitário</th>
				<th>Fornecedor</th>
				<th width="10%">Quantidade</th>
				<th width="5%"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{ $product->name }}</td>
				<td>{{ $product->unit_price }}</td>
				<td>{{ $product->provider->name }}</td>
				{{ Form::open(['method' => 'post', 'route' => 'cart.add'])}}
				<td>
					{{ Form::hidden('product_id', $product->id, ['class' => 'form-control'])}}
					{{ Form::text('qty', 1, ['class' => 'form-control'])}}
				</td>
				<td>
					<button type="sumbit" class="btn btn-success" style="float: right"><i class="fa fa-plus"></i></button>
				</td>
				{{ Form::close()}}
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


@include('dashboard.cart.cart')

@endsection

