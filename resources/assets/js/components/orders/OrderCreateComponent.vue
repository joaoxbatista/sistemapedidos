<template>
	<div class="hb-order-create">
		<div class="card">
			<div class="content">
				
				<!-- Steps -->
				<div class="row" id="steps">
					<div class="col-md-3">
						<button class="btn btn-info pull-left" v-show="fase > 0" @click="backStep"> <i class="fa fa-arrow-left"></i> Anterior</button>
					</div>
					<div class="col-md-6">
						<el-steps :active="fase" finish-status="success">
							<el-step title="Produtos">
							</el-step>
							<el-step title="Cliente"></el-step>
							<el-step title="Disconto"></el-step>
							<el-step title="Parcelamento"></el-step>
							<el-step title="Entrega"></el-step>
						</el-steps>
					</div>

					<div class="col-md-3">
						<button class="btn btn-fill btn-info pull-right" v-show="fase < 5 && cart.item_quantity > 0" @click="nextStep"> <i class="fa fa-arrow-right"></i> Próximo</button>
					</div>
				</div>
				
				<hb-order-information></hb-order-information>
				
				<!-- Entrada de Produtos -->
				<div id="input-products" v-show="fase == 0">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label>código do produto</label>
								<input 
								type="text" 
								name="product_id"
								class="form-control" 
								v-model="item.product_id" 
								v-validate data-vv-rules="required|numeric">

								<span v-show="errors.has('product_id')" class="text-danger">
									{{ errors.first('product_id') }}
								</span>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">quantidade</label>
								<input 
								type="text" 
								name="quantity"
								class="form-control" 
								v-model="item.quantity" 
								v-validate data-vv-rules="required|numeric">

								<span v-show="errors.has('quantity')" class="text-danger">
									{{ errors.first('quantity') }}
								</span>
							</div>
						</div>
						<div class="col-md-2">
							<button style="margin-top: 22px;" class="btn btn-block btn-success btn-fill" @click="addToCart"><i class="fa fa-plus"></i> Adicionar</button>
						</div>

						<div class="col-md-2">
							<button style="margin-top: 22px;" class="btn btn-block btn-danger btn-fill" @click="clearCart"><i class="fa fa-trash"></i> Limpar</button>
						</div>
					</div>
				</div>

				<!-- Seleção do cliente -->
				<div id="client" v-show="fase == 1">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Código do Cliente</label>
								<input type="text" class="form-control" v-model="client_id">
							</div>
						</div>

						<div class="col-md-2">
							<button style="margin-top: 22px;" class="btn btn-block btn-success btn-fill" @click="addClientToCart"><i class="fa fa-plus"></i> Adicionar</button>
						</div>
					</div>
				</div>
				
				<!-- Disconto -->
				<div id="discount" v-show="fase == 2">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for=""></label>
							</div>
						</div>
					</div>
				</div>

				<hb-order-product-list></hb-order-product-list>

			</div>
		</div>
	</div>


</div>
</div>
</div>
</template>

<script>
	import HBOrderProductList from './OrderProductListComponent.vue'
	import HBOrderInformation from './OrderInformationComponent.vue'

	export default {
		components: {
			'hb-order-product-list': HBOrderProductList,
			'hb-order-information': HBOrderInformation
		},

		data () {
			return {
			    client_id: '',

				fase: 0,

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
				],

				item: {
					product_id: '',
					quantity: 1
				}
			}
		},

		methods: {
			clearCart () {
				this.$store.commit('clear-cart')
			},

			nextStep () {
				if( this.fase < 5)
				{
					this.fase++
				}

				else
				{
					this.fase = 0
				}
			},

			backStep() 
			{
				if(this.fase > 0)
				{
					this.fase--
				}

				else
				{
					this.fase = 0
				}
			},

			clearItem () {
				this.item = {
					id: '',
					quantity: 1
				}
			},

			addClientToCart () {
				this.$store.dispatch('find-has-client', this.client_id)
			},

			addToCart () {
				var dataValidator = {
					quantity: this.item.quantity,
					product_id: this.item.product_id
				}

				this.$validator.validateAll(dataValidator)
				
				.then( result => {

					if(result)
					{
						this.$store.dispatch('find-has-product', dataValidator);


						if(this.cart.itemRequest.status != null && this.cart.itemRequest.message != null)
						{
							this.$message({
								message: this.cart.itemRequest.message,
								type: this.cart.itemRequest.status
							});	
						}
						
						this.$store.commit('clear-item-request-cart')
						
					}
					else
					{
						this.$message
						({
							showClose: true,
							message: 'Oops, algo está errado no formulário',
							type: 'error'
						})
					}
				})


				
			},

			removeToCart(item) {
				this.$store.commit('remove-item-to-cart', item)
			}
		},

		computed: {
			cart () {
				return this.$store.getters.getCart;
			}
		}
	}
</script>