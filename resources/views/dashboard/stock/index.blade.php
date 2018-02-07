@extends('templates.admin-dashboard')
@section('title') Estoque @endsection
@section('styles') 

@endsection

@section('content')

<div class="row">
	<div class="col-md-6">
		<hb-provider></hb-provider>
	</div>

	<div class="col-md-6">
		<hb-category></hb-category>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<hb-product></hb-product>
	</div>
</div>



@endsection

@section('scripts')
@endsection