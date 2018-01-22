<template>
	<div id="hb-order-cart-finish">
		<div class="header">
			<h4 class="title">Forma de pagamento</h4>
		</div>

		<div class="content">
			
			<div class="row">
				<div class="col-md-12" v-show="cart.client.id == null">
					<div class="alert alert-warning">Algumas opções serão bloqueadas caso não selecione um cliente</div>
				</div>

				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Selecione uma forma de pagamento</label>
								<select :disabled="cart.client.id == null" v-model="payment_form" class="form-control">
									<option :value="payment_form.value" v-for="payment_form in payment_forms">{{payment_form.label}}</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="col-md-12" v-show="payment_form == 'installment' && cart.client.id != null">
					<hb-order-cart-payment-form-installment></hb-order-cart-payment-form-installment >
				</div>
				
				<div class="col-md-12" v-show="payment_form == 'check' && cart.client.id != null">
					<hb-order-cart-payment-form-check ></hb-order-cart-payment-form-check >
				</div>

				<div class="col-md-12" v-show="payment_form == 'money' && cart.client.id != null">
					<hb-order-cart-payment-form-money></hb-order-cart-payment-form-money>
				</div>

			</div>
		</div>
	</div>
</template>

<script>
	import HBOrderCartPaymentFormInstallment from './payment_forms/OrderCartPaymentFormInstallmentComponent.vue'
	
	import HBOrderCartPaymentFormCheck from './payment_forms/OderCartPaymentFormCheckComponent.vue'

	import HBOrderCartPaymentFormMoney from './payment_forms/OrderCartPaymentFormMoneyComponent.vue'
	export default {

		components: {
			'hb-order-cart-payment-form-installment': HBOrderCartPaymentFormInstallment,
			'hb-order-cart-payment-form-check': HBOrderCartPaymentFormCheck,
			'hb-order-cart-payment-form-money': HBOrderCartPaymentFormMoney,
		},

		data () {
			return {
				payment_form: '',

				payment_forms: [
					{label: 'Dinheiro', value: 'money'},
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
	#hb-order-cart-finish
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