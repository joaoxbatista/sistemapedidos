<template>
	<!-- Informações da Compra -->
	<div id="hb-order-cart-information">
		<div class="header">
			<h4 class="title">Informações da compra</h4>
		</div>

		<div class="content">
			<div class="box-info" v-show="cart.client.name">
				<span class="value">{{ cart.client.limit_credit }} R$</span>
				<span class="title"> <i class="fa fa-user"></i>  {{ cart.client.name }}</span>
			</div>

			<div class="box-info">
				<span class="value">{{ cart.price_with_discount }} R$</span>
				<span class="title"> <i class="pe-7s-cash"></i>  Reais</span>
			</div>

			<div class="box-info">
				<span class="value">{{ cart.item_quantity }}</span>
				<span class="title"> <i class="pe-7s-box1"></i> Itens</span>
			</div>

			<div class="box-info">
				<span class="value">{{ cart.total_weight }} Kg</span>
				<span class="title"> <i class="pe-7s-box2"></i> Peso</span>
			</div>

			<div class="box-info" v-show="cart.delivery.status == 200">
				<span class="value">{{ cart.delivery.distance/1000 }} km</span>
				<span class="title"> <i class="pe-7s-box2"></i> Distância</span>
			</div>

		</div>
	</div>
</template>

<script>
	export default {
		computed: {
			cart () {
				return this.$store.getters.getCart;
			},
		}
	}
</script>

<style lang="scss">
	#hb-order-cart-information
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