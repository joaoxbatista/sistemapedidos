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
							
							<el-select v-model="payment_form" placeholder="Alguma coisa aqui">
							    <el-option
							      v-for="form in payment_forms"
							      :key="form.value"
							      :label="form.label"
							      :value="form.value"
							      :disabled="cart.client.id == null" >
							    </el-option>
							</el-select>
							
						</div>
					</div>
				</div>
				<div class="col col-md-6">
					<h5>Formas selecionadas</h5>
					
					<div class="payment-form-first">
						
						<div class="alert alert-info">
							Primeira forma de pagamento {{ cart.payment_forms.first.selected }}: {{ cart.payment_forms.first.total }} R$.

							<button type="button" class="close" aria-label="Close" @click="clearFirstForm">
    							<span aria-hidden="true">&times;</span>
  							</button>
						</div>
					</div>

					<div class="payment-form-second">
						<div class="alert alert-info">
							Segunda forma de pagamento {{ cart.payment_forms.second.selected }}: {{ cart.payment_forms.second.total }} R$.

							<button type="button" class="close" aria-label="Close" @click="clearSecondForm">
    							<span aria-hidden="true">&times;</span>
  							</button>
						</div>
					</div>
				</div>			
			
			<div/>

			<div class="row">
				<div class="col-md-12" v-show="payment_form == 'installment' && cart.client.id != null">
					<hb-order-cart-payment-form-installment></hb-order-cart-payment-form-installment >
				</div>
				
				<div class="col-md-12" v-show="payment_form == 'check' && cart.client.id != null">
					<hb-order-cart-payment-form-check ></hb-order-cart-payment-form-check >
				</div>

				<div class="col-md-12" v-show="payment_form == 'money' && cart.client.id != null">
					<hb-order-cart-payment-form-money></hb-order-cart-payment-form-money>
				</div>

				<div class="col-md-12">
					<div class="col-md-4">
						<button 
							class="btn btn-success btn-fill" 
							@click="addPrimaryForm"
							>
							Primeira forma 
						</button>
						<button 
							class="btn btn-success btn-fill" 
							@click="addSecondaryForm"
							>
							Segunda forma
						</button>
					</div>
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
				form: {

				},

				payment_form: '',

				payment_forms: [
					{label: 'Dinheiro', value: 'money'},
					{label: 'Parcelado', value: 'installment'},
					{label: 'Cheque', value: 'check'}
				],

			}
		}, 

		methods: {

			filterForm (form) {
				let data = {
					selected: form,
					total: 0
				}

				if(form == 'money')
				{
					data.total = this.cart.money
				}
				else if(form == 'installment')
				{
					data.total = this.cart.installment.total
				}
				else if(form == 'check')
				{
					data.total = this.cart.checks.total
				}

				return data
			},

			clearFirstForm () {
				this.$store.commit('clear-cart-payment-form-first')
			},

			clearSecondForm () {
				this.$store.commit('clear-cart-payment-form-second')
			},

			addPrimaryForm () {
				this.$store.commit('set-cart-payment-form-first', this.filterForm(this.payment_form))
				this.payment_form = ''

			},

			addSecondaryForm () {
				this.$store.commit('set-cart-payment-form-secondary', this.filterForm(this.payment_form))
				this.payment_form = ''
			}
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

			.payment-form-first, payment-form-second
			{
				font-size: 14px;
				display: block;
			}
		}
	}
</style>