<template>
	<div id="hb-order-cart-payment-form-installment">
		<div class="header">
			<h4 class="title">Parcelamento</h4>
		</div>

		<div class="content">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Quantidade de parcelas</label>
						<input type="text" v-model="installment.quantity"class="form-control">
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="">Selecione o intervalo</label>
						<select v-model="installment.interval" class="form-control">
							<option v-for="interval in parcels_interval" :value="interval.value">{{ interval.label }}</option>
						</select>
					</div>
				</div>
			
				<div class="col-md-2">
					<button style="margin-top: 22px;" class="btn btn-block btn-success btn-fill" @click="addInstallmentToCart"><i class="fa fa-plus"></i> Adicionar</button>
				</div>
			</div>

			<div class="row">
				<div v-show="installment.parcels.length > 0" class="col-md-12" id="list-parcels">
					<div class="header">
						<h4 class="title">Lista de Parcelas</h4>
					</div>
					<ul class="list-group">
						<li v-for="parcel in installment.parcels" class="list-group-item">
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
					{label: '15 Dias', value: 15},
					{label: '30 Dias', value: 30},
					{label: '45 Dias', value: 45}
				],

				installment: {
					interval: 1,
					quantity: 1,
					parcels: [],
				},
			}
		},

		methods: {
			addDays (dateNow, days) {
				return this.$moment(dateNow).add(days, 'days').format("DD/MM/YYYY")
			},

			addInstallmentToCart () {
				this.installment.parcels = []
				var price = this.cart.price_discount / this.installment.quantity
				price = price.toFixed(2)
				var dateNow = new Date()

				for(var i = 0; i < this.installment.quantity; i++)
				{
					var dateParcel = this.addDays(dateNow, this.installment.interval * i)
					this.installment.parcels.push({ date: dateParcel, value: price })
				}
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
