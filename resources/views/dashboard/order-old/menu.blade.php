<a href="{{ route('orders') }}" class="btn btn-default">Voltar</a>

<a href="{{ route('orders.create') }}" class="btn btn-primary">Produtos</a>

<a href="{{ route('cart') }}" class="btn btn-primary">Carrinho</a>

<a href="{{ route('orders.clients') }}" class="btn btn-primary">Cliente</a>

@if($cart->getClient())
	<a href="{{ route('orders.parcels') }}" class="btn btn-primary">Parcelamento</a>
@endif

<a href="{{ route('orders.discount') }}" class="btn btn-primary">Desconto</a>

<a href="{{ route('orders.finish')}} " class="btn btn-primary">Finalizar</a>

<br><br>
