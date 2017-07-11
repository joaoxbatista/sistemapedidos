@extends('template.saller-dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Cliente - Home</h3>

<div class="table-responsive">
	<table id="data-table" class="table table-bordered">
		
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>CPF</th>
				<th>Telefone</th>
				<th>E-mail</th>
				<th>CEP</th>
			</tr>
		</thead>

		<tbody>
			@foreach($clients as $client)
			<tr>
				<td>{{ $client->id }}</td>
				<td><a href="{{ route('saller.clients.show', ['id' => $client->id])}}">{{ $client->name }}</a></td>
				<td>{{ $client->cpf }}</td>
				<td>{{ $client->phone }}</td>
				<td>{{ $client->email }}</td>
				<td>{{ $client->cep }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection


@section('scripts')
<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('js/custom-dataTables.js')}}"></script>
@endsection