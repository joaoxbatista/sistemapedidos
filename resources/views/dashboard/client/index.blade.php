@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Cliente - Home</h3>
<a href="/dashboard/" class="btn btn-default">Voltar</a>

<a href="/dashboard/clients/create" class="btn btn-success">Novo <i class="fa fa-plus"></i></a><br><br>

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
				<th class="option-table-header"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($clients as $client)
			<tr>
				<td>{{ $client->id }}</td>
				<td>{{ $client->name }}</td>
				<td>{{ $client->cpf }}</td>
				<td>{{ $client->phone }}</td>
				<td>{{ $client->email }}</td>
				<td>{{ $client->cep }}</td>
				<td>

				<ul class="option-table">
					<li><a href="/dashboard/clients/{{$client->id}}" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
					<li><a href="/dashboard/clients/{{$client->id}}/edit" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>
					<li><a href="/dashboard/clients/{{$client->id}}/delete" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
				</ul>
				</td>
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