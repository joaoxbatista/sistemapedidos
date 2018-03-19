<template>
	<div id="hb-order-cart-payment-form-installment" class="col-md-12">
		<div class="header">
			<h4 class="title">Parcelamento</h4>
		</div>

		<div class="content">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="">Quantidade de parcelas</label>
						
						<el-select v-model="installment.quantity" placeholder="Selecione uma opção">
							<el-option 
								v-for="quantity in parcels_quantity" 
								:key="quantity.value"
								:label="quantity.label"
								:value="quantity.value"
								>
							</el-option>
						</el-select>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label for="">Selecione o intervalo</label>
						<el-select v-model="installment.interval" placeholder="Selecione uma opção">
							<el-option 
								v-for="interval in parcels_interval" 
								:key="interval.value"
								:label="interval.label"
								:value="interval.value"
								>
							</el-option>
						</el-select>
					</div>
				</div>

				<div class="col-md-3" style="margin-top: 22px;">
					<button class="btn btn-success btn-fill" @click="calculation">
						Calcular
					</button>
				</div>
			</div>

			<div class="row">
				<div v-show="installment.parcels.length > 0" class="col-md-12" id="list-parcels">
					<div class="header">
						<h4 class="title">Lista de Parcelas</h4>
					</div>
					<ul class="list-group">
						<li v-for="parcel in installment.parcels = cart.installment.parcels" class="list-group-item">
							<p> <strong>Data de pagamento:</strong> {{ $moment(parcel.date).format('DD/MM/YYYY') }} </p>
							<p> <strong>Valor:</strong> {{ parcel.value }} R$</p>
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

			calculation () {
				this.installment.parcels = []
				
				var price = this.cart.price_final / this.installment.quantity
				price = price.toFixed(2)
				
				let dateNow = new Date()
				let dateParcel = null

				for(var i = 0; i < this.installment.quantity; i++)
				{
					dateParcel = this.addDays(dateNow, this.installment.interval * i)
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
