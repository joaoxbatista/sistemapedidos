<template>
	<div id="hb-order-cart-client">
		<div class="header">
			<h4 class="title">Inserir cliente</h4>
		</div>

		<div class="content">
			<div class="row">
				<div class="col-md-3" v-show="this.cart.client.id == null">
					<div class="form-group">
						<label for="">Código ou cpf do Cliente</label>
						<input type="text" class="form-control" v-model="client_id">
					</div>
				</div>

				<div class="col-md-2">
					<button 
						style="margin-top: 22px;" 
						class="btn btn-block btn-success btn-fill" 
						@click="addClientToCart"
						v-show="this.cart.client.id == null">
							<i class="fa fa-plus"></i> 
							Adicionar
					</button>

					<button 
						style="margin-top: 22px;" 
						class="btn btn-block btn-danger btn-fill" 
						v-show="this.cart.client.id"
						@click="removeClientToCart">
							<i class="fa fa-times"></i> 
							Remover
					</button>
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
				client_id: ''
			}
		},

		methods: {
			addClientToCart () {
				this.$store.dispatch('find-has-client', { data: { cpf: this.client_id, id: this.client_id},notify: this.$message})
				this.client_id = ''
			},
			removeClientToCart () {
				this.$store.commit('remove-client-to-cart', this.$message)
				this.client_id = ''
			},
		},

		computed: {
			cart() {
				return this.$store.getters.getCart
			}
		}

	}
</script>

<style lang="scss">
	#hb-order-cart-client
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
		}


	}
</style>