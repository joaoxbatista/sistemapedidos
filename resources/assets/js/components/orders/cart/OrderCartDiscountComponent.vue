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
							    <label>Selecione uma porcentagem</label>
							    <el-slider 
							    	v-model="discount.percentage.slider" 
							    	:format-tooltip="formatTooltip" 
							    	@change="updateInputPercentage"
							    	:disabled="cart.discounts.total > 0">
							    </el-slider>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							    <label>Valor selecionado</label>
							    <input 
							    	type="number" 
							    	class="form-control" 
							    	v-model="discount.percentage.input" 
							    	@keyup="updateSliderPercentage"
							    	:disabled="cart.discounts.total > 0 ">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4" v-if="cart.discounts.total == 0">
							<button class="btn btn-block btn-success btn-fill"   @click="addDiscountToCart"><i class="fa fa-plus"></i> Adicionar</button>
						</div>
						<div class="col-md-4" v-else>
							<button class="btn btn-block btn-danger btn-fill" @click="removeDiscountToCart"><i class="fa fa-trash"></i> Cancelar</button>
						</div>
					</div>
				</div>

				<div class="col-md-6" v-show="discount.price > 0">
					<div class="box-discount">
						<div class="header">
							<h4 class="title">Informações do desconto</h4>
						</div>

						<div class="content">
							<p>Valor do desconto<span> {{ discount.price }} R$</span></p>
							<p>Preço com desconto<span> {{  price }} R$</span></p>
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
					percentage: {
						slider: 0,
						input: 0
					},
					price: 0,
				},
			}
		},

		methods: {

			updateSliderPercentage()
			{
				if(this.discount.percentage.input > 100)
				{
					this.discount.percentage.input = 100
				}

				this.discount.percentage.slider = parseFloat(this.discount.percentage.input)
				this.calculateDiscount()
			},

			updateInputPercentage()
			{
				this.discount.percentage.input = parseFloat(this.discount.percentage.slider)
				this.calculateDiscount()
			},

			addDiscountToCart () {
				
				if(this.discount.price > 0)
				{
					this.$store.commit('add-discount-to-cart', {
						data: this.discount, 
						notify: this.$message
					})
				}

			},

			removeDiscountToCart () {
				this.$store.commit('remove-discount-to-cart', {
					data: this.discount, 
					notify: this.$message
				})
				
			},

			formatTooltip (val) {
		        return val + "%";
		    },

		    calculateDiscount () {
		     	this.discount.price = this.discount.percentage.slider / 100 * this.cart.price_products
		     	this.discount.price = parseFloat(this.discount.price.toFixed(2))
		    }
		},

		computed: {
			cart () {
				return this.$store.getters.getCart;
			},

			price() {
				var result = parseFloat(this.cart.price_products - this.discount.price)
				result = result.toFixed(2)
				return result
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