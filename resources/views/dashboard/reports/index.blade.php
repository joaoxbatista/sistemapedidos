@extends('templates.admin-dashboard')
@section('title') Relatórios @endsection
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6"> 
			<div class="card">
				<div class="header">
					<h4 class="title">
						Relatórios diário
					</h4>
				</div>

				<div class="content">
					<ul class="list-group">
						<li class="list-group-item">Clientes cadastrados</li>
						<li class="list-group-item">Fornecedores cadastrados</li>
						<li class="list-group-item">Produtos cadastrados</li>
						<li class="list-group-item">Categorias cadastradas</li>
						<li class="list-group-item">Funcionários cadastrados</li>
						<li class="list-group-item">Pedidos efetuados</li>
						<li class="list-group-item">Quantidade de produtos vendidos</li>
						<li class="list-group-item">Quantidade de produtos no estoque</li>
					</ul>
					<button class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
					<button class="btn btn-default"><i class="fa fa-floppy-o"></i> Salvar</button>
				</div>

			</div>
		</div>

		<div class="col-md-6"> 
			<div class="card">
				<div class="header">
					<h4 class="title">
						Relatório mensal
					</h4>
				</div>

				<div class="content">
					
					<ul class="list-group">
						<li class="list-group-item">Clientes cadastrados</li>
						<li class="list-group-item">Fornecedores cadastrados</li>
						<li class="list-group-item">Produtos cadastrados</li>
						<li class="list-group-item">Categorias cadastradas</li>
						<li class="list-group-item">Funcionários cadastrados</li>
						<li class="list-group-item">Pedidos efetuados</li>
						<li class="list-group-item">Quantidade de produtos vendidos</li>
						<li class="list-group-item">Quantidade de produtos no estoque</li>
					</ul>
					
					<button class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
					<button class="btn btn-default"><i class="fa fa-floppy-o"></i> Salvar</button>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection