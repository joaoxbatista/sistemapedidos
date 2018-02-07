
@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('styles') 

@endsection

@section('content')

<a href="{{ route('dashboard.home') }}" class="btn btn-default">Voltar</a>
<a href="{{ route('products.create') }}" class="btn btn-success">Novo <i class="fa fa-plus"></i></a> <br><br>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Tabela de Produtos</h4>
	</div>

	<div class="panel-body">
		<table id="data-table" class="table table-bordered">
			<thead>
			<tr>
				<th width="8%">Código</th>
				<th>Image</th>
				<th>Nome</th>
				<th>Preço</th>
				<th>Fornecedor</th>
				<th class="option-table-header"></th>
			</tr>
			</thead>

			<tbody>
			@foreach($products as $product)
				<tr>
					<td>{{ $product->id }}</td>
					<td>
						@if(!is_null($product->image))
							<img width="80px" src="{{ asset('uploads/images/products/'.$product->image) }}" alt="{{ $product->name }}">
						@else
							<img width="80px" src="{{ asset('uploads/images/products/no-image.png') }}" alt="{{ $product->name }}">
						@endif
					</td>
					<td>{{ $product->name }}</td>
					<td>R$ {{ $product->unit_price }}</td>
					<td>{{ $product->provider->name }}</td>
					<td>
						<ul class="option-table">
							<li><a href="{{ route('products.show', [ 'id' => $product->id]) }}" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
							<li><a href="{{ route('products.edit', [ 'id' => $product->id]) }}" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>
							<li><a href="{{ route('products.delete', ['id' => $product->id]) }}" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
						</ul>
					</td>




				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection