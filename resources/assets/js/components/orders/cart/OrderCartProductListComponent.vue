<template>
	<!-- Lista de Produtos -->
	<div id="oder-cart-product-list" v-show="cart.items.length > 0">
		<div class="header">
			<h4 class="title">Lista de produtos</h4>
		</div>

		<div class="content">
<!-- 			<data-tables 
			:data="cart.items" 
			:table-fields="settings" 
			:pagination-def="pagSettings">

				<el-table-column 
					v-for="title in titles" 
					:field="title.field" 
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
							<a v-on:click="showModalDiscount(scope.row)" class="btn btn-fill btn-small btn-warning"><i class="fa fa-tag"></i></a>
						</div>
					</template>
				</el-table-column>

				<p slot="append">table slot</p>
			</data-tables> -->

		<vue-good-table
			:columns="columns"
			:rows="cart.items"
			:paginate="true"
			:lineNumbers="true">

			<template slot="table-row-after" slot-scope="item">
				<td>
					<button v-on:click="removeToCart(item.row)"><i class="fa fa-trash"></i></button>
					<button v-on:click="showModalDiscount(item.row)"><i class="fa fa-tag"></i></button>
				</td>
			</template>
		</vue-good-table>
		</div>

		<div id="modal-add-discount" v-show="discountModal.status">
			
			<div class="container">

				<div class="modal-content col-md-8 col-md-offset-2">
					<div class="modal-header">
						<h4 class="title">Adição de desconto em {{ discountModal.item.product.name }} </h4>
					</div>
					
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								
								subtotal do item {{ discountModal.item.total }} R$
								<br>
								valor do desconto {{ discountModal.discount }} R$
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Valor do desconto</label>
									<input v-model="discountModal.discount" type="text" class="form-control" v-on:keyup="verifyDiscount">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="btn-group">
									<button class="btn btn-fill btn-success" @click="addItemDiscount">
										<i class="fa fa-plus"></i> Adicionar
									</button>
									<button class="btn btn-fill btn-danger" @click="discountModal.status = false">
										<i class="fa fa-times"></i> Fechar
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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

			columns: [
			{ 'label': 'Código', 'field': 'id'},
			{ 'label': 'Nome', 'field': 'product.name'},
			{ 'label': 'Preço', 'field': 'product.unit_price'},
			{ 'label': 'Peso', 'field': 'product.weight'},
			{ 'label': 'Qtd.', 'field': 'quantity'},
			{ 'label': 'Desconto', 'field': 'discount'},
			{ 'label': 'Subtotal', 'field': 'subtotal_price'},
			{ 'label': 'Total', 'field': 'total_price'},
			{ 'label': 'Ações'}
			],

			discountModal: {
				item: {
					product: {
						name: ''
					}
				},
				discount: 0,
				status: false
			}

		}
	},

	methods: {
		removeToCart(item) {
			this.$store.commit('remove-item-to-cart', item)
		},

		showModalDiscount(item)
		{
			this.discountModal.status = true
			this.discountModal.item = item
		},

		addItemDiscount() {
			this.$store.commit('add-discount-item-to-cart', this.discountModal)
			this.discountModal =  {
				item: {
					product: {
						name: ''
					}
				},
				discount: 0,
				status: false
			}
		},

		verifyDiscount() {
			if(this.discountModal.discount > this.discountModal.item.subtotal_price)
			{

				this.discountModal.discount = this.discountModal.item.subtotal_price
			}

			else if(this.discountModal.discount < 0)
			{
				this.discountModal.discount = 0
			}
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

.el-table_1_column_9 > .cell
{
	padding: 0px !important;
}

#modal-add-discount
{
	background: rgba(0, 0, 0, .7);
	width: 100vw;
	height: 100vh;
	position: fixed;
	z-index: 1000;
	top: 0;
	left: 0;

	.modal-content
	{
		background: #fff;
		margin-top: 25vh;
		border-radius: 4px;


		.modal-header
		{
			width: 100%;
			height: 30px;
			padding: 15px 4px;
			margin-bottom: 20px;

			.title
			{
				color: #757575;
				font-size: 14px;
				text-transform: uppercase;
			}
		}

		.modal-body
		{
			width: 100%;
			padding: 10px 5px;
			display: block;
		}
	}
}

</style>
