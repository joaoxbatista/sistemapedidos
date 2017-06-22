@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Cliente - Home</h3>
<a href="/dashboard/" class="btn btn-default">Voltar</a>

<a href="/dashboard/clients/create" class="btn btn-success">Novo <i class="fa fa-plus"></i></a><br><br>

<div class="table-responsive">
	<table class="table table-bordered">
		
		<thead>
			<tr>
				<th>name</th>
				<th>cpf</th>
				<th>phone</th>
				<th>email</th>
				<th>cep</th>
				<th width="18%">ações</th>
			</tr>
		</thead>

		<tbody>
			@foreach($clients as $client)
			<tr>
				<td>{{ $client->name }}</td>
				<td>{{ $client->cpf }}</td>
				<td>{{ $client->phone }}</td>
				<td>{{ $client->email }}</td>
				<td>{{ $client->cep }}</td>
				<td>
					<a href="/dashboard/clients/{{$client->id}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
					<a href="/dashboard/clients/{{$client->id}}/edit" class="btn btn-success"><i class="fa fa-pencil"></i></a>
					<a href="/dashboard/clients/{{$client->id}}/delete" class="btn btn-success"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>




@endsection