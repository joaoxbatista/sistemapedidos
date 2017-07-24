@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<a href="{{ route('orders') }}" class="btn btn-default">Voltar</a><br><br>

<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#products">Produtos</a></li>
	<li><a data-toggle="tab" href="#cart">Carrinho <span class="badge badge-default">{{ $cart->getTotalQuantity() }}</span></a></li>
	<li><a data-toggle="tab" href="#add-client">Cliente</a></li>
	<li><a data-toggle="tab" href="#payment">Forma de Pagamento</a></li>
</ul>

<div class="tab-content">
	<div id="products" class="tab-pane fade in active">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Seleção de Produtos</h4>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="data-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Código</th>
								<th>Imagem</th>
								<th>Nome</th>
								<th>Preço unitário</th>
								<th>Fornecedor</th>
								<th width="40px">Quantidade</th>
								<th width="40px"></th>
							</tr>
						</thead>

						<tbody>
							@foreach($products as $product)
							<tr>
								<td>{{ $product->id }} </td>
								 @if($product->image != null)
	                            <td><img width="60px" src="{{ asset('uploads/images/products/'.$product->image) }}" alt=""></td>
	                            @else
	                            <td><img width="60px" src="{{ asset('uploads/images/products/no-image.png') }}" alt=""></td>
	                            @endif
	                            <td>{{ $product->name }}</td>
								<td>{{ $product->unit_price }}</td>
								<td>{{ $product->provider->name }}</td>
								{{ Form::open(['method' => 'post', 'route' => 'cart.add'])}}
								<td>
									{{ Form::hidden('product_id', $product->id, ['class' => 'form-control'])}}
									{{ Form::text('quantity', 1, ['class' => 'form-control'])}}
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
				
			</div>
		</div>
	</div>

	<div id="cart" class="tab-pane fade">
		@include('dashboard.cart.cart')
	</div>

	<div id="add-client" class="tab-pane fade">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Informações da cliente</h4>
			</div>
			<div class="panel-body">
				@if(!is_null($cart->getClient()))
					<a class="btn btn-danger" href="{{ route('cart.remove.client') }}"> Remover</a> <br><br>
					@if($cart->getClient() != null)
						<p><strong>Cliente: </strong>{{ $cart->getClient()->name }}</p>

						@if($cart->getClient()->limit_credit != null)
						<p><strong>Limite de Crédito: </strong>{{ $cart->getClient()->limit_credit }}</p>
						@endif

					@endif

				@else
				<div class="col-md-3">
					{{ Form::open(['method' => 'post', 'route' => 'cart.add.client'])}}
					<div class="form-group">
				        {{ Form::label('client_id', 'Insira o código do cliente') }}
				        {{ Form::text('client_id', '', ['class' => 'form-control']) }}
				    </div>
				    <div style="margin-top: -10px; margin-bottom: 10px;">
				        {{ Form::submit('Adicionar', ['class' => 'btn btn-primary']) }}
				    </div>
					{{ Form::close()}}
				</div>
				@endif
			</div>
		</div>
	</div>

	<div id="payment" class="tab-pane fade">
		<a href="">Adicionar Prazo</a>
		<a href="">Adicionar Parcelas</a>
	</div>
	
	<div>
		
	</div>
	
</div>



@endsection

@section('styles')
<style>
	section{
		margin-bottom: 20px;
	}
</style>
@endsection()
@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection