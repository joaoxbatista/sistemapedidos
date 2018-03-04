@extends('templates.admin-dashboard')
@section('title') Pedido @endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<a href="{{ route('admin-dashboard.orders.create') }}" class="btn btn-fill btn-success">Novo pedido</a>
			<hb-order-list></hb-order-list>
		</div>
	</div>
</div>
@endsection
@section('scripts') 

@endsection