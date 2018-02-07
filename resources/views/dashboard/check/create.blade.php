@extends('template.dashboard')
@section('title') Dashboard | Cadastro de cheques @endsection
@section('content')

{{ Form::open(['method' => 'post', 'route' => 'checks.store'])}}
	
	<!-- Informações do Cheque -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Registro do cheque</h4>
		</div>

		<div class="panel-body">
			<div class="form-group col-md-4">
				{{ Form::label('holder_name', 'Nome do Títular') }}
				{{ Form::text('holder_name', '', ['class' => 'form-control', 'required' => true]) }}
			</div>
			<div class="form-group col-md-4">
				{{ Form::label('value', 'Valor do cheque') }}
				{{ Form::text('value', '', ['class' => 'form-control', 'required' => true]) }}
			</div>

			<div class="form-group col-md-4">
				{{ Form::label('bank', 'Banco') }}
				{{ Form::text('bank', '', ['class' => 'form-control', 'required' => true]) }}
			</div>

			<div class="form-group col-md-4">
				{{ Form::label('agency', 'Agência') }}
				{{ Form::text('agency', '', ['class' => 'form-control', 'required' => true]) }}
			</div>

			<div class="form-group col-md-4">
				{{ Form::label('acount_number', 'Número da conta') }}
				{{ Form::text('acount_number', '', ['class' => 'form-control', 'required' => true]) }}
			</div>

			<div class="form-group col-md-4">
				{{ Form::label('cpf', 'CPF') }}
				{{ Form::text('cpf', '', ['class' => 'form-control', 'required' => true]) }}
			</div>

			<div class="form-group col-md-4">
				{{ Form::label('cnpj', 'CNPJ') }}
				{{ Form::text('cnpj', '', ['class' => 'form-control', 'required' => true]) }}
			</div>

		</div>
	</div><!--/ Informações Pessoais -->

{{ Form::submit('Salvar', ['class' => 'btn btn-success'])}}

{{ Form::close()}}

@endsection


@section('scripts')
	<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
	<script>
		$(document).ready(function(){
			$('#cpf').mask('999.999.999-99');
            $('#cnpj').mask('99.999.999/9999-99');
            $('#cep').mask('99999-999');
		});
	</script>
@endsection