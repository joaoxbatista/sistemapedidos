@extends('template.dashboard')
@section('title') Dashboard | Produtos @endsection
@section('content')
@include('dashboard.order.menu')
@if(count($cart->getItems()) > 0)
<div class="col-md-12">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Desconto</h4>
			</div>

			<div class="panel-body">
				
				@if($cart->getDiscount())
						<a href="{{ route('cart.clear.discount') }}" class="btn btn-danger"><i class="fa fa-trash"></i> Cancelar</a><br><br>
						<p> Preço <strong>R$ {{ $cart->getTotalPrice() }}</strong>.  </p>
						<p> Desconto  <strong>R$ {{ $cart->getDiscount() }}</strong>. </p>
						<p> Preço com desconto <strong>R$ {{ $cart->getTotalPriceWithDiscount()}}</strong>.</p>
					
				@else
			
				{{ Form::open(['route' => 'order.discount', 'method' => 'post'])}}
					<div class="col-md-2">
						<div class="form-group">
							{{ Form::label('discount', 'Valor do desconto') }}
							{{ Form::text('discount', '', ['class' => 'form-control']) }}
						</div>
						<div class="form-group">
							{{ Form::radio('discount_type', 'value') }}
							{{ Form::label('discount_type', 'valor real') }}
						</div>

						<div class="form-group">
							{{ Form::radio('discount_type', 'percent') }}
							{{ Form::label('discount_type', 'porcentagem') }}
						</div>

						{{ Form::submit('Adicionar', ['class' => 'btn btn-success']) }}
					</div>
				{{ Form::close()}}
				
				@endif


			</div>
		</div>
	</div>
</div>
@else
	<h4>É necessário que existam items no carrinho.</h4>
@endif
@endsection
