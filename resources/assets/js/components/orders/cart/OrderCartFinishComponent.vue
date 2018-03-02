<template>
	<div id="hb-order-cart-finish">
		<div class="header">
			<h4 class="title">Finalização do pedido</h4>
		</div>

		<div class="content">
			<div class="row">
				<div class="col-md-3">
					<button class="btn btn-success btn-fill btn-block" @click="finishOrder()"> 
						<i class="fa fa-calculator"></i> Finalizar pedido
					</button>
					
				</div>

				<div class="col-md-3">
					<button class="btn btn-primary btn-fill btn-block" @click="pendingOrder"> 
						<i class="fa fa-hourglass"></i> Deixar pendente
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
				
			}
		},

		methods: {
			finishOrder () {
				alert('Finalizar pedido')
				this.$store.dispatch('finish-order', this.cart)
			},

			pendingOrder () {
				alert('Deixar pedido pendente')
			}
		},

		computed: {
			cart () {
				return this.$store.getters.getCart;
			},
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
