<template>
	<div id="hb-order-cart-payment-form">
		<div class="header">
			<h4 class="title">Forma de pagamento</h4>
		</div>

		<div class="content">
			
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Selecione uma forma de pagamento</label>
								<select v-model="payment_form" class="form-control">
									<option :value="payment_form.value" v-for="payment_form in payment_forms">{{payment_form.label}}</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12">
					<hb-order-cart-payment-form-installment v-show="payment_form == 'installment'"></hb-order-cart-payment-form-installment >
				</div>
				
				<div class="col-md-12">
					<hb-order-cart-payment-form-check v-show="payment_form == 'check'"></hb-order-cart-payment-form-check >
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import HBOrderCartPaymentFormInstallment from './payment_forms/OrderCartPaymentFormInstallmentComponent.vue'
	
	import HBOrderCartPaymentFormCheck from './payment_forms/OderCartPaymentFormCheckComponent.vue'

	export default {

		components: {
			'hb-order-cart-payment-form-installment': HBOrderCartPaymentFormInstallment,
			'hb-order-cart-payment-form-check': HBOrderCartPaymentFormCheck
		},

		data () {
			return {
				payment_form: '',

				payment_forms: [
					{label: 'Dinheiro', value: 'money'},
					{label: 'Cartão', value: 'credit_cart'},
					{label: 'Parcelado', value: 'installment'},
					{label: 'Cheque', value: 'check'}
				],

			}
		}, 

		methods: {
			
		},

		created () {
			this.$store.dispatch('update-banks')
			console.log(this.banks)
		},

		computed: {
			cart () {
				return this.$store.getters.getCart;
			},

			banks () {
				return this.$store.getters.getBanks;
			}
		}
	}
</script>

<style lang="scss">
	#hb-order-cart-payment-form
	{
		.header
	    {
	    	position: relative;
	    	padding: 5px 0px;
	    	box-sizing: border-box;
			

	    	.title
	    	{
				color: #757575;
				text-transform: uppercase;
				font-size: 14px;
	    	}
		}

		.content
		{
			width: 100%;
			padding: 0px;
			margin-bottom: 10px;
			margin-top: 10px;
		}
	}
</style>