@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')

<h3>Dashboard - Cliente - Create</h3>

<a href="/dashboard/providers/" class="btn btn-default">Voltar</a>

{{ Form::open(['method' => 'post', 'route' => 'providers.store'])}}
<div class="form-group">
	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', '', ['class' => 'form-control', 'required' => true]) }}
</div>

<div class="form-group">
	{{ Form::label('cnpj', 'CNPJ')}}
	{{ Form::text('cnpj', '', ['class' => 'form-control', 'required' => true]) }}

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

@endsection