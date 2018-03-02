<template>
	<div id="hb-order-cart-payment-form-installment">
		<div class="header">
			<h4 class="title">Parcelamento</h4>
		</div>

		<div class="content">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Valor</label>
						<input type="text" 
						v-model="installment.value" 
						class="form-control">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Quantidade de parcelas</label>
						<select v-model="installment.quantity"
						@change="addInstallmentToCart"
						class="form-control">
							<option 
							v-for="quantity in parcels_quantity" 
							:value="quantity.value"
							>
								{{ quantity.label }}
							</option>
						</select>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="">Selecione o intervalo</label>
						<select v-model="installment.interval"
						@change="addInstallmentToCart"
						class="form-control">
							<option 
							v-for="interval in parcels_interval" 
							:value="interval.value"
							:selected="interval.selected == true">
								{{ interval.label }}
							</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div v-show="installment.parcels.length > 0" class="col-md-12" id="list-parcels">
					<div class="header">
						<h4 class="title">Lista de Parcelas</h4>
					</div>
					<ul class="list-group">
						<li v-for="parcel in installment.parcels = cart.installment.parcels" class="list-group-item">
							<span> Data: {{ parcel.date }} <i class="fa fa-calendar"></i></span>
							<span> Valor: {{ parcel.value }} R$</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data () {
			return {
				parcels_interval: [
					{label: '15 Dias', value: 15, selected: true},
					{label: '30 Dias', value: 30, selected: false},
					{label: '45 Dias', value: 45, selected: false}
				],
				parcels_quantity: [
					{label: '1', value: 1},
					{label: '2', value: 2},
					{label: '3', value: 3},
					{label: '4', value: 4},
					{label: '5', value: 5},
					{label: '6', value: 6},
					{label: '7', value: 7},
					{label: '8', value: 8},
					{label: '9', value: 9},
					{label: '10', value: 10},
					{label: '11', value: 11},
					{label: '12', value: 12}
				],
				installment: {
					interval: 0,
					quantity: 0,
					value: 0,
					parcels: [],
				},
			}
		},

		methods: {
			addDays (dateNow, days) {
				return this.$moment(dateNow).add(days, 'days').format('YYYY-MM-DD HH:MM:SS')
			},

			addInstallmentToCart () {
				this.installment.parcels = []
				
				var price = this.cart.price_final / this.installment.quantity
				price = price.toFixed(2)
				var dateNow = new Date()

				for(var i = 0; i < this.installment.quantity; i++)
				{
					var dateParcel = this.addDays(dateNow, this.installment.interval * i)
					this.installment.parcels.push({ date: dateParcel, value: price })
				}

				this.$store.commit('set-cart-parcels', this.installment)
			},
		},

		computed: {
			cart () {
				return this.$store.getters.getCart;
			},
		}
	}
</script>

<style lang="scss">
#hb-order-cart-payment-form-installment
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
