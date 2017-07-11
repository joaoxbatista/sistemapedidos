@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard/Vendedores/Home</h3>
<a href="{{ route('dashboard.home') }}" class="btn btn-default">Voltar</a>

<a href="{{ route('sallers.create') }}" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a><br><br>

<div class="table-responsive">
	<table id="data-table" class="table table-bordered">
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>CPF</th>
				<th>E-mail</th>
				<th>Salário</th>
				<th>Vendas</th>
				<th class="option-table-header"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($sallers as $saller)
				<tr>
					<td>{{$saller->id}}</td>
					<td>{{$saller->name}}</td>
					<td>{{$saller->cpf}}</td>
					<td>{{$saller->email}}</td>
					<td>{{$saller->payment}}</td>
					<th>{{$saller->sales}}</th>
					<td>
						<ul class="option-table">
							<li><a href="{{ route('sallers.show', ['id' => $saller->id]) }}" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
							<li><a href="{{ route('sallers.edit', ['id' => $saller->id]) }}" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>
							<li><a href="{{ route('sallers.destroy', ['id' => $saller->id]) }}" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
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