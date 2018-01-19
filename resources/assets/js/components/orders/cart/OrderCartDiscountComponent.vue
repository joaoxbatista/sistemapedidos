<template>
	<div id="hb-order-cart-discount">
		<div class="header">
			<h4 class="title">Adicionar desconto</h4>
		</div>

		<div class="content">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							    <label for="">Selecione uma porcentagem</label>
							    <el-slider v-model="discount.percentage" :format-tooltip="formatTooltip" @change="priceWithDiscount"></el-slider>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							    <label for="discount-percent">Valor selecionado</label>
							    <input type="number" id="discount-percent" class="form-control" v-model="discount.value" @keyup="updatePercentage">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<button style="margin-top: 22px;" :class="{'disabled' : total_discount == 0}" class="btn btn-block btn-success btn-fill" @click="addDiscountToCart"><i class="fa fa-plus"></i> Adicionar</button>
						</div>
					</div>
				</div>

				<div class="col-md-6" v-show="total_discount > 0">
					<div class="box-discount">
						<div class="header">
							<h4 class="title">Informações do desconto</h4>
						</div>

						<div class="content">
							<p>Valor do desconto<span> {{ total_discount }} R$</span></p>
							<p>Preço com desconto<span> {{ price_with_discount }} R$</span></p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data ()
		{
			return {
				discount: {
					percentage: 0,
					value: 0
				},
				total_discount: 0,
				price_with_discount: 0,
			}
		},

		created () 
		{
			this.price_with_discount = this.cart.total_price
		},

		methods: {
			addDiscountToCart () {
				
				if(this.total_discount > 0)
				{
					this.$store.commit('add-discount-to-cart', {
						data: {
							discount: this.total_discount,
							price_with_discount: this.price_with_discount
						}, 
						notify: this.$message
					})
				}

			},

			updatePercentage() {
				
				this.discount.value = parseInt(this.discount.value)
				
				if(this.discount.value > 100) {
					this.discount.value = 100
				}
				else if ( this.discount.value < 0) {
					this.discount.value = 0
				}

				this.discount.percentage = this.discount.value

				this.priceWithDiscount()
			},


			formatTooltip (val) {
		        return val + "%";
		    },

		    priceWithDiscount () {
		    	this.discount.value = this.discount.percentage
		     	this.total_discount = this.discount.percentage / 100 * this.cart.total_price
		     	this.total_discount = parseFloat(this.total_discount.toFixed(2))

		     	this.price_with_discount = this.cart.total_price - this.total_discount
		     	this.price_with_discount = parseFloat(this.price_with_discount.toFixed(2))
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
	#hb-order-cart-discount
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

			.box-discount
			{
				
				margin: 0px;
				padding: 0px;
				color: #757575;
				border-radius: 4px;

				.header
				{
					width: 100%;
			    	padding: 5px 10px;
					border-bottom: 1px solid #c8c8c8;

					.title
					{
						color: #757575;
						text-transform: uppercase;
						font-size: 14px;
						font-weight: bold;

					}
				}

				.content
				{
					padding: 10px;

					p
					{
						display: block;
						width: 100%;
						font-size: 12px;
						text-transform: uppercase;

						span
						{

							background: #fff; 
							color: #757575;
							padding: 2px 4px;
							border-radius: 2px;
							font-weight: bold;
							font-size: 14px;
							margin-left: 4px;
						}
					}
				}

			}
		}


	}
</style>