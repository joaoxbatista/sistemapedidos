<template>
	<div id="hb-order-cart-delivery">
		<div class="header">
			<h4 class="title">Informações da entrega</h4>
		</div>

		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<h4>Informações do local de envio</h4>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Estado</label>
						<input type="text" v-model="origin.state" class="form-control">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Cidade</label>
						<input type="text" v-model="origin.city" class="form-control">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Bairro</label>
						<input type="text" v-model="origin.district" class="form-control">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Rua</label>
						<input type="text" v-model="origin.street" class="form-control">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Número</label>
						<input type="text" v-model="origin.number" class="form-control">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Complemento</label>
						<input type="text" v-model="origin.complement" class="form-control">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h4>Informações do destino</h4>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Estado</label>
						<input type="text" v-model="destiny.state" class="form-control">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Cidade</label>
						<input type="text" v-model="destiny.city" class="form-control">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Bairro</label>
						<input type="text" v-model="destiny.district" class="form-control">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Rua</label>
						<input type="text" v-model="destiny.street" class="form-control">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Número</label>
						<input type="text" v-model="destiny.number" class="form-control">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Complemento</label>
						<input type="text" v-model="destiny.complement" class="form-control">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<button class="btn btn-success btn-fill" @click="deliveryCalculation"> 
						<i class="fa fa-calculator"></i> Calcular Frete
					</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data () {
			return {
				destiny: {
					state: null,
					city: null,
					district: null,
					street: null,
					number: null,
					complement: null
				},

				origin: {
					state: null,
					city: null,
					district: null,
					street: null,
					number: null,
					complement: null
				}
			}
		},

		methods: {
			deliveryCalculation () {
				var payload = {
					data: { origin: this.origin, destiny: this.destiny},
					notify: this.$message
				}

				this.$store.dispatch('delivery-calculation', payload)
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
#hb-order-cart-delivery
{
	box-shadow: 2px 2px 4px rgba(190, 190, 190, .8);
    background: #F5F5F5;
    padding: 10px;
    border-radius: 6px;

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


		.box-info
		{
			display: inline-block;
			max-width: 24.5%;
			min-width: 24.5%;
			color: #757575;
			margin-bottom: 10px;
			font-size: 26px;
			border: 1px solid #e9e9e9;
			padding: 10px;

			.value
			{
				text-align: center;
				display: block;
			}

			.title
			{
				font-size: 14px;
				margin-left: 10px;
				display: block;
				text-align: center;
			}
		}
	}
}
</style>
