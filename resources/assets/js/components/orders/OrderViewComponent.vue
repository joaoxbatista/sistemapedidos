<template>
	<div id="hb-order-view">

		<h3>Pedido {{ data.id }}</h3>
		
		<div class="panel panel-default">
			<h4>Informações do cliente</h4>
			ID: {{ data.client_id }}

			> link para visualizar histórico de compra do cliente
		</div>

		<div class="panel panel-default">
			<h4>Informações do vendedo</h4>
				> link para visualizar histórico do vendedor
				ID: {{ data.seller_id }}

		</div>
		
		<div class="panel panel-default">
			<h4>Informações da compra</h4>
				> Lista dos items
				> Informações do frente
				> Informações do desconto
		</div>

		<div class="panel panel-default" v-show="data.parcels">
			<h4>Informações do parcelamento</h4>
				
				<ul class="list-group">
					<li v-for="parcel in data.parcels" class="list-group-item">
						<strong>Data de pagamento</strong> {{ parcel.pay_date }} <br>
						<strong>Valor:</strong> {{ parcel.value }} <br>
						<button class="btn btn-success btn-fill" v-show="!parcel.status">
							confirmar
						</button>
					</li>
				</ul>
		</div>


	</div>
</template>

<script>
export default {
	props: ["data"],

	data () {
		return {

		}
	}, 

	created () {

	},

}
</script>