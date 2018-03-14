<template>
	<div id="hb-order-list">
		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-table"></i> &nbsp LISTAGEM</h4>
			</div>
			<div class="content">
				<vue-good-table
			      :columns="columns"
			      :rows="orders"
			      :paginate="true"
			      :lineNumbers="true">

				    <template slot="table-row-after" slot-scope="order">
					  <td>
					  	<button v-on:click="open(order)" class="open-icon"><i class="fa fa-folder"></i></button>
					  </td>
					</template>
				</vue-good-table>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		 data () {
		 	return {
		 		settings: {
					bordered: true
				},
				
				dialogTableVisible: false,

				pagSettings: {
				    pageSize: 5,
				    pageSizes: [5, 10, 20],
				    currentPage: 1
				},

				 columns: [
			        { 'label': 'Código', 'field': 'id', filterable: true},
					{ 'label': 'Data de Pag.', 'field': 'due_date', filterable: true},
					{ 'label': 'Data de Comp..', 'field': 'buy_date', filterable: true},
					{ 'label': 'Codigo do Cliente', 'field': 'client_id', filterable: true},
					{ 'label': 'Codigo do Vendedor', 'field': 'seller_id', filterable: true},
					{ 'label': 'Preço', 'field': 'price_final', filterable: true},
					{ 'label': 'Ações'},
			     ],
		 	}
		 }, 

		 created () {
		 	this.$store.dispatch('update-orders')
		 },

		 computed: {

		 	orders () {
		 		return this.$store.state.orders.data
		 	}
		 }
	}
</script>