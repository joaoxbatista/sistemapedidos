@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<a href="{{ route('sellers') }}" class="btn btn-default">Voltar</a><br><br>

<!-- Informações Financeiras -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Informações financeiras</h4>
	</div>

	<div class="panel-body">

		<div class="form-group col-md-3">
			<p><strong>Tipo do pagamento: </strong>
				@if($seller->payment != null and $seller->comission == null)
					Salário
				@elseif($seller->payment == null and $seller->comission != null)
					Comissão
				@elseif($seller->payment != null and $seller->comission != null)
					Salário e Comissão
				@endif
			</p>
			<p>
				@if($seller->payment != null and $seller->comission == null)
					<strong>Valor: </strong> R${{ $seller->payment }}
				@elseif($seller->payment == null and $seller->comission != null)
					<strong>Porcentagem: </strong> {{ $seller->comission }}%
				@elseif($seller->payment != null and $seller->comission != null)
					<strong>Valor e Porcentagem: </strong> R${{$seller->payment}}, {{$seller->comission}}%
				@endif
			</p>
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
					<p><strong>Nome: </strong>{{ $seller->name }}</p>
				</div>

				<div class="form-group col-md-4">
					<p><strong>CPF: </strong>{{ $seller->cpf }}</p>
				</div>
			</div>

			
			<div class="row">
				<div class="form-group col-md-4">
					<p><strong>Fotografia: </strong></p>
					<img class="img-rounded" width="180px" src="{{ asset($seller->image) }}" alt="{{$seller->name}}">

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
			<p><strong>E-mail: </strong>{{ $seller->email }}</p>
		</div>

	</div>
</div><!--/ Informaçoes de Acesso -->

@endsection