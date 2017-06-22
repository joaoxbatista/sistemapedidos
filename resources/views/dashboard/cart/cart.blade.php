
	<h3>Carrinho de Compras</h3>
	@if(count($cart->items))
		{{ Form::open(['method' => 'post', 'route' => 'orders.store'])}}

		<div class="row">
			<div class="col-md-3 form-group">
				{{ Form::label('client_id', 'Selecione um cliente')}}
				{{ Form::select('client_id', $clients, '', ['class' => 'form-control'])}}
				{{ Form::hidden('buy_date', \Carbon\Carbon::now()) }}
				{{ Form::hidden('total', $cart->totalPrice)}}
			</div>
		</div>	

		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="5%"></th>
							<th>Produto</th>
							<th width="5%">Quantidade</th>
							<th width="5%">Preço unitário</th>
							<th width="10%">Subtotal</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($cart->items as $item)
							<tr>
								<td><a href="{{ route('cart.remove', ['id' => $item['item']->id]) }}" class="btn btn-danger"><i class="fa fa-times"></i></a></td>

								<td> 
									{{ $item['item']->name }}
								</td>
								
								<td>
									{{ $item['qty'] }}
								</td>

								<td>R$ {{ $item['item']->unit_price }}</td>
								
								<td>R$ {{ $item['item']->unit_price * $item['qty'] }}</td>
								
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td><strong>Total</strong></td>
							<td>R$ {{$cart->totalPrice}}</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-1">
				{{ Form::submit('Finalizar' , ['class' => 'btn btn-success'])}}
			</div>
			
		</div>
		{{ Form::close() }}
	@else
		<h3>Ops! Você ainda não possui itens no carrionho.</h3>
	@endif
