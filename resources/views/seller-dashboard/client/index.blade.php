@extends('template.seller-dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Tabela de Clientes</h4>
	</div>

	<div class="panel-body">
		<div class="table-responsive">
			<table id="data-table" class="table table-bordered">
				
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Telefone</th>
						<th>E-mail</th>
						<th>CEP</th>
					</tr>
				</thead>

				<tbody>
					@foreach($clients as $client)
					<tr>
						<td>{{ $client->id }}</td>
						<td><a href="{{ route('seller.clients.show', ['id' => $client->id])}}">{{ $client->name }}</a></td>
						<td>{{ $client->phone }}</td>
						<td>{{ $client->email }}</td>
						<td>{{ $client->cep }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection


@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection