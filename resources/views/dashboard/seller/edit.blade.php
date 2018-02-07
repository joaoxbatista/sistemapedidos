@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

	<a href="{{ route('sellers') }}" class="btn btn-default">Voltar</a><br><br>

	{{ Form::open(['method' => 'post', 'route' => 'sellers.update', 'files' => true])}}
	{{ Form::hidden('user_id', Auth::user()->id)}}
	{{ Form::hidden('id', $seller->id)}}

	<!-- Informações Financeiras -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações financeiras</h4>
		</div>

		<div class="panel-body">
			<div class="col-md-12">
				<p>Os funcionários podem possuir remuneração por comissão ou salário. Não é necessário preencher os dois campos.</p>
			</div>

			<div class="form-group col-md-3">
				{{Form::label('payment', 'Salário')}}
				{{Form::text('payment', $seller->payment, ['class' => 'form-control'])}}
			</div>

			<div class="form-group col-md-3">
				{{Form::label('comission', 'Comissão')}}
				{{Form::text('comission', $seller->comission, ['class' => 'form-control'])}}
				<p class="help-block">São admitidos valores de no máximo até 999.</p>

			</div>
		</div>
	</div><!--/ Informações Financeiras -->

	<!-- Informações Pessoais e Documentos -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações pessoais e documentos</h4>
		</div>

		<div class="panel-body">
			<div class="col-md-12">
				<div class="row">
					<div class="form-group col-md-4">
						{{Form::label('name', 'Nome *', ['class' => 'text-danger'])}}
						{{Form::text('name', $seller->name , ['class' => 'form-control', 'required'])}}
					</div>

					<div class="form-group col-md-4">
						{{Form::label('cpf', 'CPF *', ['class' => 'text-danger'])}}
						{{Form::text('cpf', $seller->cpf, ['class' => 'form-control', 'required'])}}
						<p class="help-block">Insira 12 números sem traços e pontos.</p>
					</div>
				</div>
				@if($seller->image != null)
				<div class="row">
					<div class="col-md-4">
						<img class="img-rounded" width="180px" src="{{ asset($seller->image)  }}" alt="">
					</div>
				</div>
				@endif

				<div class="row">
					<div class="form-group col-md-4">
						{{ Form::label('file', 'Fotografia') }}
						{{ Form::file('file', ['class' => 'form-file']) }}
					</div>

				</div>
			</div>
		</div>
	</div><!--/ Informações Pessoais e Documentos -->

	<!-- Informaçoes de Acesso -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Informações de acesso</h4>
		</div>

		<div class="panel-body">
			<div class="form-group col-md-4">
				{{Form::label('email', 'E-mail *', ['class' => 'text-danger'])}}
				{{Form::text('email', $seller->email , ['class' => 'form-control'])}}
			</div>

		</div>
	</div><!--/ Informaçoes de Acesso -->

	{{ Form::submit('Salvar', ['class' => 'btn btn-success'])}}
	{{ Form::close()}}

@endsection