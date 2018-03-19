<template>
	<div id="hb-order-cart-product">
		<div class="header">
			<h4 class="title">Entrada de Produtos</h4>
		</div>

		<div class="content">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>código do produto</label>
						<input 
						ref="product_id"
						type="text" 
						name="product_id"
						class="form-control" 
						v-model="item.product_id" 
						v-validate data-vv-rules="numeric">

						<span v-show="errors.has('product_id')" class="text-danger">
							{{ errors.first('product_id') }}
						</span>
					</div>
				</div>
				<div class="col-md-4">
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
				<div class="col-md-4">
					<div class="btn-group">
						<button :disabled="item.product_id == null || item.quantity == null" style="margin-top: 22px;" class="btn btn-success btn-fill" @click="addToCart"><i class="fa fa-plus"></i> Adicionar</button>
					
						<!-- <button style="margin-top: 22px;" class="btn btn-danger btn-fill" @click="clearCart"><i class="fa fa-trash"></i> Limpar</button> -->
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
				item: {
					product_id: null,
					quantity: null
				}
			}
		}, 

		methods: {
			clearCart () {
				this.$store.commit('clear-cart')
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
						this.$store.dispatch('find-has-product', { data: dataValidator, notify: this.$message});
						
						this.$store.commit('clear-item-request-cart')
						
						this.$nextTick(
							() => {
								this.$refs.product_id.focus()
								this.clearItem()
							}
						)

					}
					else
					{
						this.$message
						({
							showClose: true,
							message: 'Oops, algo está errado no formulário',
							type: 'error'
						})
						this.$nextTick(() => this.$refs.product_id.focus())
					}
				})

			},

			clearItem () {
				this.item = {
					id: null,
					quantity: null
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
	#hb-order-cart-product
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
</style>