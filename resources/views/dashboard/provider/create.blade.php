@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

	<a href="{{ route('providers') }}" class="btn btn-default">Voltar</a><br><br>

	<!-- Informações Pessoais e Documento -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações Pessoais e Documentos.</h4>
		</div>
		<div class="panel-body">
			{{ Form::open(['method' => 'post', 'route' => 'providers.store'])}}
			<div class="row">
				<div class="form-group col-md-4">
					{{ Form::label('name', 'Name') }}
					{{ Form::text('name', '', ['class' => 'form-control', 'required' => true]) }}
				</div>

				<div class="form-group col-md-2">
					{{ Form::label('cnpj', 'CNPJ')}}
					{{ Form::text('cnpj', '', ['class' => 'form-control', 'required' => true]) }}

				</div>
			</div>

		</div>
	</div> <!--/ Informações Pessoais e Documento -->

	<!-- Informações de Contato -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações de Contato</h4>
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="form-group col-md-2">
					{{ Form::label('phone', 'Telefone')}}
					{{ Form::text('phone', '', ['class' => 'form-control', 'required' => true]) }}
				</div>

				<div class="form-group col-md-4">
					{{ Form::label('email', 'E-mail')}}
					{{ Form::text('email', '', ['class' => 'form-control', 'required' => true]) }}

				</div>
			</div>
		</div>
	</div><!-- Informações de Contato -->

	<!-- Inforamções de Endereço -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações de Endereço</h4>
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="form-group col-md-2">
					{{ Form::label('state', 'Estado')}}
					{{ Form::text('state', '', ['class' => 'form-control', 'required' => true]) }}
				</div>

				<div class="form-group col-md-2">
					{{ Form::label('city', 'Cidade')}}
					{{ Form::text('city', '', ['class' => 'form-control', 'required' => true]) }}
				</div>

				<div class="form-group col-md-4">
					{{ Form::label('street', 'Bairro')}}
					{{ Form::text('street', '', ['class' => 'form-control']) }}

				</div>

				<div class="form-group col-md-2">
					{{ Form::label('district', 'Rua')}}
					{{ Form::text('district', '', ['class' => 'form-control']) }}
				</div>

				<div class="form-group col-md-2">
					{{ Form::label('cep', 'CEP')}}
					{{ Form::text('cep', '', ['class' => 'form-control']) }}
				</div>

			</div>

			{{ Form::hidden('user_id', Auth::user()->id)}}
			{{ Form::submit('Salvar', ['class' => 'btn btn-success'])}}
			{{ Form::close()}}
		</div>
	</div><!-- Inforamções de Endereço -->

@endsection