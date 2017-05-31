@extends('template.simple')
@section('title') Dashboard | Home @endsection
@section('content')
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<h3>Dashboard - Cliente - Home</h3>
				<a href="/dashboard/" class="btn btn-default">Voltar</a>
			</div>
			

			<div class="row">
				<h3>Clientes Cadastrados</h3>

				<div class="table-responsive">
					<table class="table table-bordered">
						
						<thead>
							<tr>
								<th>name</th>
								<th>cpf</th>
								<th>phone</th>
								<th>email</th>
								<th>cep</th>
								<th>ações</th>
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
										<a href="/dashboard/clients/{{$client->id}}" class="btn btn-info">Show</a>
										<a href="/dashboard/clients/{{$client->id}}/edit" class="btn btn-warning">Edit</a>
										<a href="/dashboard/clients/{{$client->id}}/delete" class="btn btn-danger">Delete</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>

				<a href="/dashboard/clients/create" class="btn btn-success">Create + </a>
			</div>

		</div>


	</div>
@endsection