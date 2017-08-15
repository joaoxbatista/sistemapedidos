@extends('template.dashboard')

@section('content')

<table class="table" id="datatable">
	<thead>
		
		<tr>
			<th>ID</th>
			<th>Nome</th>
		</tr>
	</thead>

</table>
@endsection

@section('scripts')
	<script src="{{ asset('js/jquery.dataTables.js')}}"></script>
	<script src="{{ asset('js/custom-dataTables.js')}}"></script>
	<script>
		function dataTableProdutcs(){
			$("#datatable").DataTable({
				"ajax" : {
					"url" : "/cart/items"
				},
				"columns": [
		            { "data": "id" },
		            { "data": "name" },
		        ]
			});
		}
		$(function(){
			dataTableProdutcs();
		});
	</script>
@endsection