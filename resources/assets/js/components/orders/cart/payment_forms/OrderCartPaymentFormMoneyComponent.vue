<template>
	<div id="order-cart-payment-form-money">
		<div class="header">
			Dinheiro
		</div>
		<div class="content">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" class="form-control" v-model="money">
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data () {
			return {
				money: 0
			}
		}
	}
</script>

<style lang="scss">
	#order-cart-payment-form-money
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