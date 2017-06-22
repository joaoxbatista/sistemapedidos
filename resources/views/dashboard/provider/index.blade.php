@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Fornecedores - Home</h3>
<a href="/dashboard" class="btn btn-default">Voltar</a>

<a href="/dashboard/providers/create" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a><br><br>

<div class="table-responsive">
	<table class="table table-bordered">

		<thead>
			<tr>
				<th>name</th>
				<th>cnpj</th>
				<th>phone</th>
				<th>email</th>
				<th>cep</th>
				<th width="18%">ações</th>
			</tr>
		</thead>

		<tbody>
			@foreach($providers as $provider)
			<tr>
				<td>{{ $provider->name }}</td>
				<td>{{ $provider->cnpj }}</td>
				<td>{{ $provider->phone }}</td>
				<td>{{ $provider->email }}</td>
				<td>{{ $provider->cep }}</td>
				<td>
					<a href="/dashboard/providers/{{$provider->id}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
					<a href="/dashboard/providers/{{$provider->id}}/edit" class="btn btn-success"><i class="fa fa-pencil"></i></a>
					<a href="/dashboard/providers/{{$provider->id}}/delete" class="btn btn-success"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


@endsection