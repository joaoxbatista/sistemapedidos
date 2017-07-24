@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<a href="{{ route('clients') }}" class="btn btn-default">Voltar</a><br><br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações do Cliente</h4>
	</div>

	<div class="panel-body">
		<p><strong>Nome: </strong>{{ $client->name }}</p>

		<p><strong>Limite de Crédito: </strong>R${{ $client->limit_credit }}</p>
		@if($client->cnjp != null)
			<p><strong>CNPJ: </strong>{{ $client->cnpj }}</p>
		@else
			<p><strong>CPF: </strong>{{ $client->cpf }}</p>
		@endif

		<p><strong>Telefone: </strong>{{ $client->phone }}</p>
		<p><strong>E-mail: </strong>{{ $client->email }}</p>
		<p><strong>CEP: </strong>{{ $client->cep }}</p>
		<p><strong>Bairro: </strong>{{ $client->street }}</p>
		<p><strong>Rua: </strong>{{ $client->district }}</p>
		<p><strong>Cidade: </strong>{{ $client->city }}</p>
		<p><strong>Estado: </strong>{{ $client->state }}</p>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações das compra</h4>
	</div>

	<div class="panel-body">
		<div class="table-responsive">
			<table id="data-table" class="table table-bordered">

				<thead>
				<tr>
					<th>Código</th>
					<th>Data de Compra</th>
					<th>Data do Pagamento</th>
					<th>Vendedor</th>
					<th>Total</th>
				</tr>
				</thead>

				<tbody>
				@foreach($client->orders as $order)
					<tr>
						
						<td style="color: white; font-weight: bold;"
                        @if($order->status)
                            class="label-success"
                        @else
                            class="label-danger"
                        @endif
                        >
                        	{{ $order->id}}
                        </td>
						<td>{{ $order->buy_date }}</td>
						<td>{{ $order->due_date }}</td>
						<td>
							@if(isset($order->seller->name))
								{{ $order->seller->id }} - {{ $order->seller->name}}
							@else
								Sem vendedor					
							@endif
						</td>
						<td>R$ {{ $order->total}}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection