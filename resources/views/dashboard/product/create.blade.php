@extends('template.dashboard')
@section('title') Dashboard | Home @endsection
@section('content')
<h3>Dashboard - producte - Create</h3>

<a href="/dashboard/products/" class="btn btn-default">Voltar</a><br><br>

{{ Form::open(['method' => 'post', 'route' => 'products.store'])}}
<div class="row">
	<div class="form-group col-md-4">
		{{ Form::label('name', 'Nome') }}
		{{ Form::text('name', '', ['class' => 'form-control', 'required' => true]) }}
	</div>

	<div class="form-group col-md-2">
		{{ Form::label('unit_price', 'Preço unitário') }}
		{{ Form::text('unit_price', '', ['class' => 'form-control', 'required' => true]) }}
	</div>

	<div class="form-group col-md-2">
		{{ Form::label('weight', 'Peso') }}
		{{ Form::text('weight', '', ['class' => 'form-control', 'required' => true]) }}
	</div>

	<div class="form-group col-md-2">
		{{ Form::label('provider_id', 'Fornecedor') }}
		{{ Form::select('provider_id', $providers , [] ,['class' => 'form-control']) }}
	</div>
</div>



<div class="form-group">
	{{ Form::label('desc', 'Descrição') }}
	{{ Form::textarea('desc', '', ['class' => 'form-control']) }}
</div>



{{ Form::hidden('user_id', 1)}}
{{ Form::submit('Save', ['class' => 'btn btn-success'])}}
{{ Form::close()}}

@endsection