@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<a href="{{ route('orders') }}" class="btn btn-default">Voltar</a><br><br>

<ul class="nav nav-tabs">

	<li class="tab-products"><a data-toggle="tab" href="#products">Produtos</a></li>
	
	<li><a data-toggle="tab" href="#cart">Carrinho <span class="badge badge-default">{{ $cart->getTotalQuantity() }}</span></a></li>
	
	<li class="tab-client"><a data-toggle="tab" href="#add-client">Cliente</a></li>
	
	<li><a data-toggle="tab" href="#parcel">Parcelamento</a></li>
	
	<li><a data-toggle="tab" href="#fenish">Finalizar</a></li>
</ul>

<div class="tab-content">
	
	@include('dashboard.order.tabs.products')
	@include('dashboard.order.tabs.cart')
	@include('dashboard.order.tabs.clients')
	@include('dashboard.order.tabs.parcels')
	@include('dashboard.order.tabs.fenish')
</div>

@endsection

@section('scripts')
<script>
	$(document).ready(function () {
	    if (window.location.hash == '#add_client') {
	        $('li.tab-products').removeClass('active');
	        $('div#products').removeClass('active');
	        $('li.tab-client').addClass('active');
	        $('div#add_client').addClass('active in');
	        

	    }
	});
</script>
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection