@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<a href="{{ route('dashboard.home') }}" class="btn btn-default">Voltar</a>

<a href="{{ route('sallers.create') }}" class="btn btn-success">Novo <i class="fa fa-plus"></i> </a><br><br>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Tabela de vendedores</h4>
	</div>

	<div class="panel-body">

		<div class="table-responsive">
			<table id="data-table" class="table table-bordered">
				<thead>
				<tr>
					<th width="40px">Código</th>
					<th width="80px">Imagem</th>
					<th>Nome</th>
					<th>CPF</th>
					<th class="option-table-header"></th>
				</tr>
				</thead>

				<tbody>
				@foreach($sallers as $saller)
					<tr>
						<td>{{$saller->id}}</td>
						<td><img class="img-circle" width="80px" src="{{ asset('uploads/images/sellers/'.$saller->image) }}" alt=""></td>
						<td>{{$saller->name}}</td>
						<td>{{$saller->cpf}}</td>
						<td>
							<ul class="option-table">
								<li><a href="{{ route('sallers.show', ['id' => $saller->id]) }}" class="opt opt-view"><i class="fa fa-eye"></i></a></li>
								<li><a href="{{ route('sallers.edit', ['id' => $saller->id]) }}" class="opt opt-edit"><i class="fa fa-pencil"></i></a></li>
								<li><a href="{{ route('sallers.delete', ['id' => $saller->id]) }}" class="opt opt-delete"><i class="fa fa-trash"></i></a></li>
							</ul>
						</td>
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