
@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('styles') 

@endsection

@section('content')

<h3>Dashboard - Produtos - Home</h3>
<a href="/dashboard/" class="btn btn-default">Voltar</a>
<a href="/dashboard/products/create" class="btn btn-success">Novo <i class="fa fa-plus"></i></a> <br><br>

<table id="data-table" class="table table-bordered">
	<thead>
		<tr>
			<th width="8%">#</th>
			<th>Nome</th>
			<th width="15%">Preço</th>
			<th width="15%">Fornecedor</th>
			<th class="option-table-header"></th>
		</tr>
	</thead>

	<tbody>
		@foreach($products as $product)
		<tr>
			<td>{{ $product->id }}</td>
			<td>{{ $product->name }}</td>
			<td>R$ {{ $product->unit_price }}</td>
			<td>{{ $product->provider->name }}</td>
			<td>
				<ul class="option-table">
					<li><a href="/dashboard/products/{{$product->id}}" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
					<li><a href="/dashboard/products/{{$product->id}}/edit" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>
					<li><a href="/dashboard/products/{{$product->id}}/delete" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
				</ul>
			</td>


				
				
		</tr>
		@endforeach
	</tbody>
</table>


@endsection

@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection