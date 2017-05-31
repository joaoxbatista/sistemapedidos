@extends('template.simple')
@section('title') Dashboard | Home @endsection
@section('content')
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<div class="row">
				<h3>Dashboard - Cliente - Create</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<a href="/dashboard/clients/" class="btn btn-default">Voltar</a>
			</div>

			<div class="row">
				{{ Form::open(['method' => 'post', 'route' => 'clients.store'])}}
					<div class="form-group">
						{{ Form::label('name', 'Name') }}
						{{ Form::text('name', '', ['class' => 'form-control', 'required' => true]) }}
					</div>

					<div class="form-group">
						{{ Form::label('cpf', 'CPF')}}
						{{ Form::text('cpf', '', ['class' => 'form-control', 'required' => true]) }}
						
					</div>

					<div class="form-group">
						{{ Form::label('phone', 'Telefone')}}
						{{ Form::text('phone', '', ['class' => 'form-control', 'required' => true]) }}
					</div>

					<div class="form-group">
						{{ Form::label('email', 'E-mail')}}
						{{ Form::text('email', '', ['class' => 'form-control', 'required' => true]) }}
						
					</div>

					<div class="form-group">
						{{ Form::label('cep', 'CEP')}}
						{{ Form::text('cep', '', ['class' => 'form-control']) }}
						
					</div>

					<div class="form-group">
						{{ Form::label('street', 'Bairro')}}
						{{ Form::text('street', '', ['class' => 'form-control']) }}
						
					</div>


					<div class="form-group">
						{{ Form::label('district', 'Rua')}}
						{{ Form::text('district', '', ['class' => 'form-control']) }}
					</div>
					
					<div class="form-group">
						{{ Form::label('city', 'Cidade')}}
						{{ Form::text('city', '', ['class' => 'form-control', 'required' => true]) }}
					</div>

					<div class="form-group">
						{{ Form::label('state', 'Estado')}}
						{{ Form::text('state', '', ['class' => 'form-control', 'required' => true]) }}
					</div>

					{{ Form::hidden('user_id', 1)}}
					{{ Form::submit('Save', ['class' => 'btn btn-success'])}}
				{{ Form::close()}}
			</div>
		</div>
	</div>
@endsection