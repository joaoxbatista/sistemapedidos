<template>
	<!-- Informações da Compra -->
	<div id="hb-order-cart-information">
		<div class="header">
			<h4 class="title">Informações da compra</h4>
		</div>

		<div class="content">
			<div class="box-info" v-show="cart.price_final > 0">
				<span class="value">{{ cart.price_final }} R$</span>
				<span class="title">valor a ser pago </span>
			</div>

			<div class="box-info" v-show="cart.client.name">
				<span class="value">{{ cart.client.name }}</span>
				<span class="title">possui o limite de {{ cart.client.limit_credit }} R$</span>
			</div>

			<div class="box-info" v-show="cart.price_products > 0">
				<span class="value">{{ cart.price_products }} R$</span>
				<span class="title">preço dos produtos</span>
			</div>

			<div class="box-info" v-show="cart.discounts.total > 0">
				<span class="value">{{ cart.discounts.total }} R$</span>
				<span class="title">valor do desconto </span>
			</div>

			<div class="box-info" v-show="cart.delivery.status == 200">
				<span class="value">{{ cart.delivery.price }} R$</span>
				<span class="title">preço do frete</span>
			</div>

			<div class="box-info" v-show="cart.item_quantity > 0">
				<span class="value">{{ cart.item_quantity }}</span>
				<span class="title">quantidade de itens</span>
			</div>

			<div class="box-info" v-show="cart.total_weight > 0">
				<span class="value">{{ cart.total_weight }} Kg</span>
				<span class="title">peso da compra</span>
			</div>

		</div>
	</div>
</template>

<script>
	export default {
		computed: {
			cart () {
				return this.$store.getters.getCart
			},

			business_setting () {
				return this.$store.getters.getBussinesSetting
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