@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Pedidos - Home</h3>
<a href="/dashboard/" class="btn btn-default">Voltar</a>
<a href="/dashboard/orders/create" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a> <br> <br>

<div class="table-responsive">
	<table class="table table-bordered">
		
		<thead>
			<tr>
				<th>Data da compra</th>
				<th>Data de pagamento</th>
				<th>Cliente</th>
				<th>Total</th>
				<th width="18%">ações</th>
			</tr>
		</thead>

		<tbody>
			@foreach($orders as $order)
			<tr>
				<td>{{ $order->buy_date }}</td>
				<td>{{ $order->pay_date }}</td>
				<td>{{ $order->client->name }}</td>
				<td>R$ {{ $order->total}}</td>
				<td>
					<a href="/dashboard/orders/{{$order->id}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
					<a href="/dashboard/orders/{{$order->id}}/edit" class="btn btn-success"><i class="fa fa-pencil"></i></a>
					<a href="/dashboard/orders/{{$order->id}}/delete" class="btn btn-success"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>




</div>
@endsection