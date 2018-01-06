
@extends('templates.admin-dashboard')
@section('title') Dashboard | Home @endsection
@section('styles') 

@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title">Gerêncie seus produtos</h4>
				<p class="category">Clique no nome do produto para visualizar</p>
				<br>
				<a href="{{ route('admin-dashboard.products.create') }}" class="btn btn-success">Novo <i class="fa fa-plus"></i></a>
			</div>
			
			<div class="content table-responsive ">
				<table class="table table-hover table-striped" id="data-table">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nome</th>
							<th>Preço</th>
							<th>Categoria</th>
							<th>Fornecedor</th>
						</tr>
					</thead>

					<tbody>
						@foreach($products as $product)
						<tr>
							<td>{{ $product->id }}</td>
							<td>
								<a href="{{ route('admin-dashboard.products.show', [ 'id' => $product->id]) }}">
									{{ $product->name }}
								</a>
							</td>
							<td>R$ {{ $product->unit_price }}</td>
							<td>
								@if( $product->category)
									{{ $product->category->name }}
								@else
									sem categoria
								@endif
							</td>
							<td>{{ $product->provider->name }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>



@endsection

@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection