@extends('templates.simple')

@section('title') Home - SGP Hbioss @endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css')}}">
@endsection

@section('content') 

<div id="app">

	<section id="login-bar">
		<a href="{{ route('login') }}">Administração</a>	
		<a href="">Funcionário</a>	
	</section>

	<section id="tools">
		<div class="container">
			<div class="row">
				<div class="col-md-3 tool">
					<div class="header text-center">
						<h3><i class="fa fa-shopping-basket"></i></h3>
						<h4>Estoque</h4>
					</div>
					<div class="content">
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
						</p>
					</div>
				</div>

				<div class="col-md-3 tool">
					<div class="header text-center">
						<h3><i class="fa fa-line-chart"></i></h3>
						<h4>Relatórios</h4>
					</div>
					<div class="content">
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
						</p>
					</div>
				</div>


				<div class="col-md-3 tool">
					<div class="header text-center">
						<h3><i class="fa fa-users"></i></h3>
						<h4>Clientes</h4>
					</div>
					<div class="content">
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
						</p>
					</div>
				</div>


				<div class="col-md-3 tool">
					<div class="header text-center">
						<h3><i class="fa fa-vcard-o"></i></h3>
						<h4>Funcionários</h4>
					</div>
					<div class="content">
						<p class="text-justify">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
						</p>
					</div>
				</div>


			</div>
		</div>
	</section>	
</div>


@endsection