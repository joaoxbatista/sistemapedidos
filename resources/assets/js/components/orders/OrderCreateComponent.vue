<template>
	<div class="hb-order-create">
		<div class="card">
			<div class="content">
				
				<!-- Steps -->
				<div id="steps">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<button class="btn btn-info btn-block" v-show="fase > 0" @click="backStep" accesskey="k"> <i class="fa fa-arrow-left"></i> Anterior</button>
						</div>
						<div class="col-md-6 col-sm-12" style="margin: 10px 0px;">
							<el-steps :active="fase" finish-status="success">
								<el-step title="Produtos">
								</el-step>
								<el-step title="Cliente"></el-step>
								<el-step title="Desconto"></el-step>
								<el-step title="Entrega"></el-step>
								<el-step title="Pagamento"></el-step>
								<el-step title="Finalizar"></el-step>
							</el-steps>
						</div>
						<div class="col-md-3 col-sm-12">
							<button class="btn btn-fill btn-info btn-block" v-show="fase < 5 && cart.item_quantity > 0" @click="nextStep" accesskey="l"> <i class="fa fa-arrow-right"></i> Próximo</button>
						</div>
					</div>
				</div>
				
			
				<hb-order-cart-information></hb-order-cart-information>
				
				<hb-order-cart-product v-show="fase == 0"></hb-order-cart-product>
				
				<hb-order-cart-product-list v-show="fase == 0 && cart.items.length > 0"></hb-order-cart-product-list>
				
				<hb-order-cart-client v-show="fase == 1"></hb-order-cart-client>
				
				<hb-order-cart-discount v-show="fase == 2"></hb-order-cart-discount>
				
 				<hb-order-cart-delivery v-show="fase == 3"></hb-order-cart-delivery>

				<hb-order-cart-payment-form v-if="fase == 4"></hb-order-cart-payment-form>


 				<hb-order-cart-finish v-show="fase == 5"></hb-order-cart-finish>
			</div>
		</div>
	</div>

</template>

<script>
	import HBOrderCartProductList from './cart/OrderCartProductListComponent.vue'
	import HBOrderCartInformation from './cart/OrderCartInformationComponent.vue'
	import HBOrderCartProduct from './cart/OrderCartProductComponent.vue'
	import HBOrderCartClient from './cart/OrderCartClientComponent.vue'
	import HBOrderCartDiscount from './cart/OrderCartDiscountComponent.vue'
	import HBOrderCartPaymentForm from './cart/OrderCartPaymentFormComponent.vue'
	import HBOrderCartDelivery from './cart/OrderCartDeliveryComponent.vue'
	import HBOrderCartFinish from './cart/OrderCartFinishComponent.vue'

	export default {
		components: {
			'hb-order-cart-product-list': HBOrderCartProductList,
			'hb-order-cart-information': HBOrderCartInformation,
			'hb-order-cart-product': HBOrderCartProduct,
			'hb-order-cart-client': HBOrderCartClient,
			'hb-order-cart-discount': HBOrderCartDiscount,
			'hb-order-cart-payment-form': HBOrderCartPaymentForm,
			'hb-order-cart-delivery': HBOrderCartDelivery,
			'hb-order-cart-finish': HBOrderCartFinish,
		},

		data () {
			return {
				fase: 0,
			}
		},

		methods: {
		

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
		},

		computed: {
			cart () {
				return this.$store.getters.getCart;
			}
		}
	}
</script>