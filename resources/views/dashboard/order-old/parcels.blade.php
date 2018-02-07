
@extends('template.dashboard')
@section('title') Dashboard | Parcelmento @endsection
@section('content')
@include('dashboard.order.menu')

@if(count($cart->getItems()) > 0)
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Parcelamento</h4>
	</div>
	<div class="panel-body">

		@if(is_null($cart->getParcels()))
		{{ Form::open(['method' => 'post', 'route' => 'cart.add.parcels']) }}

		<div class="col-md-3">	
			<div class="form-group">
				{{ Form::label('parcels_quantity', 'Quantidade de parcelas') }}
				{{ Form::text('parcels_quantity', '', ['class' => 'form-control']) }}
			</div>
			<div style="margin-top: -10px; margin-bottom: 10px;">
				{{ Form::button('Adicionar parcelas', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				{{ Form::label('parcels_interval', 'Intervalo de dias') }}
				{{ Form::text('parcels_interval', '', ['class' => 'form-control']) }}
			</div>
		</div>

		{{ Form::close() }}
		@else
		<a href="{{ route('cart.remove.parcels') }}" class="btn btn-danger"><i class="fa fa-trash"></i> Cancelar</a><br><br>

		@foreach($cart->getParcels() as $parcel)
		<div class="well">
			<p>Data do Pagamento {{ $parcel['pay_date']->format('d/m/Y') }}</p>
			<p>Valor  R$ {{ $parcel['value'] }} </p>
		</div>
		@endforeach
		@endif

	</div>
</div>
@else
	<h4>É necessário que existam items no carrinho.</h4>
@endif
@endsection