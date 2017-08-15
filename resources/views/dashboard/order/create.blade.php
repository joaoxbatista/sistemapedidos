@extends('template.dashboard')
@section('title') Dashboard | Produtos @endsection

@section('alerts')
	<div id="result-alert" class="alert alert-dismissable" style="display: none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
	  <p></p>
	</div>
@endsection

@section('content')
@include('dashboard.order.menu')
<div class="well">
	<div class="row">
		<div class="form-group col-md-2">
			<input type="text" id="product_id" class="form-control">
		</div>	

		<button class="btn btn-success" id="find_product"> <i class="fa fa-search"></i> Pesquisar</button>
	</div>

	<div class="row" id="preview" style="margin-top: 10px; display: none;">
		<div class="col-md-4">
			<div class="product thumbnail">
		      <img src="">
		      <div class="caption">
		        <h3 class="product_name"></h3>
		        <h4 class="product_price label label-success"></h4>
		        <p class="product_description"></p>
		      </div>
		    </div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label>Quantidade</label>
				<input type="text" id="product_quantity" class="form-control">
			</div>
			<button class="btn btn-success" id="add-product">Adicionar</button>
		</div>
	</div>

</div>


@endsection

@section('scripts')
<script src="{{ asset('js/create-order.js') }}"></script>

@endsection