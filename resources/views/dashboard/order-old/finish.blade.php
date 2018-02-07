@extends('template.dashboard')
@section('title') Dashboard | Produtos @endsection
@section('content')
@include('dashboard.order.menu')
@if(count($cart->getItems()) > 0)
<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">	
			<div class="panel-heading">	
				<h4>Finalizar pedido</h4>
			</div>
			
			<div class="panel-body">	
				<!-- Informações do Cliente -->
				@if($cart->getClient())
					<h4>Informações do cliente</h4>
					<p><strong>Cliente: </strong>{{ $cart->getClient()->name }}</p>
					<p><strong>{{ $cart->getClient()->getIdentify(true
					) }} : </strong>{{ $cart->getClient()->getIdentify() }}</p>

	                @if($cart->getClient()->limit_credit != null)
	                <p><strong>Limite de Crédito: </strong> R${{ $cart->getClient()->limit_credit }}</p>
	                @endif
					<hr>
				@endif
				
				<!-- Informações da Parcela -->
				@if($cart->getParcels())
					<h4>Informações do parcelamento</h4>
					@foreach($cart->getParcels() as $index => $parcel)
					<div class="well">
						<p><strong>{{$index+1 }}ª Parcela</strong></p>
						<p><strong>Data do Pagamento:</strong> {{ $parcel['pay_date']->format('d/m/Y') }}</p>
						<p><strong>Valor:</strong> R${{ $parcel['value'] }} </p>
					</div>
					@endforeach
				@endif

				@if($cart->getItems())
					<h4>Lista de Produtos</h4>
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>Nome do Produto</th>
								<th>Quantidade</th>
								<th>Preço</th>
							</tr>
						</thead>
						<tbody>
							@foreach($cart->getItems() as $item)
							<tr>
								<td>{{ $item->product->name }}</td>
								<td>{{ $item->quantity }}</td>
								<td>{{ $item->price }}</td>
							</tr>
							@endforeach
							<tr>
								<td></td>
								<td><strong>Total sem desconto</strong></td>
								<td><strong>R$ {{ $cart->getTotalPrice() }}</strong></td>
							</tr>
							@if($cart->getTotalPriceWithDiscount() != $cart->getTotalPrice() )
								<tr>
									<td></td>
									<td><strong>Total com desconto</strong></td>
									<td><strong>R$ {{ $cart->getTotalPriceWithDiscount() }}</strong></td>
								</tr>
							@endif
						</tbody>
					</table>
				@endif

				{{ Form::open(['method' => 'post', 'route' => 'orders.store'])}}
				{{ Form::button('Finalizar', ['type' => 'submit', 'class' => 'btn btn-success'])}}
				{{ Form::close()}}
			</div>
		</div>
	</div>
</div>
@else
	<h4>É necessário que existam items no carrinho.</h4>
@endif
@endsection
