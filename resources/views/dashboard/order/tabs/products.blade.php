
<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Seleção de Produtos</h4>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table id="products-table" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Quantidade</th>
						<th>Preço</th>
						<th width="260px">Ação</th>
					</tr>
				</thead>

				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
</div>


<script>
	function addProducts(){
		$('#products-table').on('click', '.btn-add-product', function(){
			
			var id = $(this).parents('tr').find('.id-product');
			var quantity = $(this).parents('tr').find('.product-quantity');
			var token = $(this).parents('tr').find('._token');

			var dataPost = {
				product_id : id.html(),
				quantity : quantity.val()
			};	

			console.log(dataPost);

			$.post('/cart/add', dataPost, 
				function(data) {
					alert(data);
				}
				);
		});
	}

	function dataTablesProduct(){
		$("#products-table").DataTable({
			"processing": true,
			"serverSide": true,
			"ajax" : "/products-datatable",
			"columns": [
			{ 'data' : 'id', 'sClass': 'id-product'},
			{ 'data' : 'name' },
			{ 'data' : 'quantity' },
			{ 'data' : 'unit_price' },
			{ 
				"data": null,
				"bSortable": false,
				"mRender": function (o) { 

					return '<div class="form-group col-md-6"><input type="text" class="form-control product-quantity"></div><button class="btn btn-success btn-add-product">Adicionar</button>' ;
				}
			},
			]
		});
	}
</script>
