@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Produtos - Home</h3>
<a href="/dashboard/" class="btn btn-default">Voltar</a>
<a href="/dashboard/products/create" class="btn btn-success">Novo <i class="fa fa-plus"></i></a> <br><br>

<div class="table-responsive">
	<table class="table table-bordered">

		<thead>
			<tr>
				<th>Nome</th>
				<th>Preço unitário</th>
				<th>Fornecedor</th>
				<th width="18%">ações</th>
			</tr>
		</thead>

		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{ $product->name }}</td>
				<td>{{ $product->unit_price }}</td>
				<td>{{ $product->provider->name }}</td>
				<td>
					<a href="/dashboard/products/{{$product->id}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
					<a href="/dashboard/products/{{$product->id}}/edit" class="btn btn-success"><i class="fa fa-pencil"></i></a>
					<a href="/dashboard/products/{{$product->id}}/delete" class="btn btn-success"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>



@endsection