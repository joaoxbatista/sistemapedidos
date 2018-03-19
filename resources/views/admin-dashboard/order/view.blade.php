@extends('templates.admin-dashboard')
@section('title') Pedido > Visualizar @endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<hb-order-view v-bind:data="{{$order_json}}"></hb-order-view>
		</div>
	</div>
</div>
@endsection
@section('scripts') 

@endsection