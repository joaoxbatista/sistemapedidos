@extends('template.dashboard')
@section('title') Dashboard | providere | Editar @endsection
@section('content')

				<h3>Dashboard - Fornecedores - Editar</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<a href="/dashboard/providers/" class="btn btn-default">Voltar</a>



				{{ Form::open(['method' => 'post', 'route' => 'providers.update'])}}
					<div class="form-group">
						{{ Form::label('name', 'Name') }}
						{{ Form::text('name', $provider->name, ['class' => 'form-control', 'required' => true]) }}
					</div>

					<div class="form-group">
						{{ Form::label('cnpj', 'CNPJ')}}
						{{ Form::text('cnpj', $provider->cnpj, ['class' => 'form-control', 'required' => true]) }}
						
					</div>

					<div class="form-group">
						{{ Form::label('phone', 'Telefone')}}
						{{ Form::text('phone', $provider->phone, ['class' => 'form-control', 'required' => true]) }}
					</div>

					<div class="form-group">
						{{ Form::label('email', 'E-mail')}}
						{{ Form::text('email', $provider->email, ['class' => 'form-control', 'required' => true]) }}
						
					</div>

					<div class="form-group">
						{{ Form::label('cep', 'CEP')}}
						{{ Form::text('cep', $provider->cep, ['class' => 'form-control']) }}
						
					</div>

					<div class="form-group">
						{{ Form::label('street', 'Bairro')}}
						{{ Form::text('street', $provider->street, ['class' => 'form-control']) }}
						
					</div>


					<div class="form-group">
						{{ Form::label('district', 'Rua')}}
						{{ Form::text('district', $provider->district, ['class' => 'form-control']) }}
					</div>
					
					<div class="form-group">
						{{ Form::label('city', 'Cidade')}}
						{{ Form::text('city', $provider->city, ['class' => 'form-control', 'required' => true]) }}
					</div>

					<div class="form-group">
						{{ Form::label('state', 'Estado')}}
						{{ Form::text('state', $provider->state, ['class' => 'form-control', 'required' => true]) }}
					</div>

					{{ Form::hidden('id', $provider->id) }}

					{{ Form::submit('Save', ['class' => 'btn btn-success'])}}
				{{ Form::close()}}
	
@endsection