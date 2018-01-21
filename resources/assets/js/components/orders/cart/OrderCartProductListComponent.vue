<template>
	<!-- Lista de Produtos -->
	<div id="oder-cart-product-list" v-show="cart.items.length > 0">
		<div class="header">
			<h4 class="title">Lista de produtos</h4>
		</div>

		<div class="content">
			<data-tables 
			:data="cart.items" 
			:table-props="settings" 
			:pagination-def="pagSettings">

				<el-table-column 
					v-for="title in titles" 
					:prop="title.prop" 
					:label="title.label" 
					:key="title.label" 
					:width="title.width"
					sortable="custom">
				</el-table-column>

				<el-table-column
					label="Ações"
					width="145px">

					<template scope="scope" id="button-actions">
						<div class="btn-group btn-group-justified">
							<a v-on:click="removeToCart(scope.row)" class="btn btn-fill btn-small btn-danger"><i class="fa fa-trash"></i></a>
							<a v-on:click="discountModal
							.status = true" class="btn btn-fill btn-small btn-warning"><i class="fa fa-tag"></i></a>
						</div>
					</template>
				</el-table-column>

				<p slot="append">table slot</p>
			</data-tables>
		</div>

		<el-dialog title="Adicionar desconto ao produto" :visible.sync="discountModal.status">
		  <div class="col-md-4">
		  	<div class="form-group">
		  		<label>Valor do desconto</label>
		  		<input type="text" v-model="discountModal.item.discount" class="form-control">
		  	</div>
		  </div>
		</el-dialog>
	</div>
</template>

<script>
	export default {
		data () {
			return {
				settings: {
					bordered: true
				},

				pagSettings: {
					pageSize: 5,
					pageSizes: [5, 10, 20],
					currentPage: 1
				},

				titles: [
				{ 'label': 'Código', 'prop': 'id'},
				{ 'label': 'Nome', 'prop': 'product.name'},
				{ 'label': 'Preço', 'prop': 'product.unit_price'},
				{ 'label': 'Peso', 'prop': 'product.weight'},
				{ 'label': 'Quantidade', 'prop': 'quantity'},
				{ 'label': 'Subtotal', 'prop': 'subtotal_price'},
				],

				discountModal: {
					item: {},
					status: false
				}

			}
		},

		methods: {
			removeToCart(item) {
				this.$store.commit('remove-item-to-cart', item)
			},

			addItemDiscount(item) {
				this.discountModal.status = true
				this.discountModal.item = item
			}
		},

		computed: {
			cart () {
				return this.$store.getters.getCart;
			}
		}
	}
	
</script>

<style lang="scss">
	#oder-cart-product-list	
	{
		box-shadow: 2px 2px 4px rgba(190, 190, 190, .8);
	    background: #F5F5F5;
	    padding: 10px;
	    border-radius: 6px;
	    margin-top: 10px;

	    .header
	    {
	    	width: 100%;
	    	padding: 5px 10px;
			border-bottom: 1px solid #e9e9e9;

	    	.title
	    	{
				color: #757575;
				text-transform: uppercase;
				font-size: 16px;
	    	}
		}

		.content
		{
			width: 100%;
			margin-bottom: 10px;
		}
	}

	.el-table_1_column_7 > .cell
	{
		padding: 0px !important;
	}

</style>
