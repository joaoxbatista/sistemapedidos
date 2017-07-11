@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Fornecedores - View</h3>
<a href="{{ route('sallers') }}" class="btn btn-default">Voltar</a><br><br>
<div class="well">
	<img src="{{ asset('uploads/images/sellers/'.$saller->image) }}" alt="">
	<p><strong>Nome: </strong>{{ $saller->name }}</p>
	<p><strong>CPF: </strong>{{ $saller->cpf }}</p>
	<p><strong>Salário: </strong>{{ $saller->payment }}</p>
	<p><strong>Vendas: </strong>{{ $saller->sales }}</p>
	<p><strong>E-mail: </strong>{{ $saller->email }}</p>
	
</div>

@endsection