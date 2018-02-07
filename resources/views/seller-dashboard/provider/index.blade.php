@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Fornecedores - Home</h3>
<a href="/dashboard" class="btn btn-default">Voltar</a>

<a href="/dashboard/providers/create" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a><br><br>

<div class="table-responsive">
	<table id="data-table" class="table table-bordered">

		<thead>
			<tr>
				<th>Nome</th>
				<th>CNPJ</th>
				<th>Telefone</th>
				<th>E-mail</th>
				<th>CEP</th>
				<th class="option-table-header"></th>
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
					<ul class="option-table">
						<li><a href="/dashboard/providers/{{$provider->id}}" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
						<li><a href="/dashboard/providers/{{$provider->id}}/edit" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>
						<li><a href="/dashboard/providers/{{$provider->id}}/delete" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
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