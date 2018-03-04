<template>
	<div id="hb-order-list">
		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-table"></i> &nbsp LISTAGEM</h4>
			</div>
			<div class="content">
				<data-tables 
				:data="orders" 
				:table-props="settings" 
				:pagination-def="pagSettings">
					<el-table-column 
						v-for="title in titles" 
						:prop="title.prop" 
						:label="title.label" 
						:key="title.label" 
						sortable="custom">
					</el-table-column>

					<el-table-column
						label="+"
						width="60">

						<template scope="scope">
							<a v-on:click="open(scope)" class="open-icon"><i class="fa fa-folder"></i></a>
						</template>

					</el-table-column>

					<p slot="append">table slot</p>
				</data-tables>
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

				titles: [
				{ 'label': 'Código', 'prop': 'id'},
					{ 'label': 'Data de Pag.', 'prop': 'due_date'},
					{ 'label': 'Data de Comp..', 'prop': 'buy_date'},
					{ 'label': 'Codigo do Cliente', 'prop': 'client_id'},
					{ 'label': 'Codigo do Vendedor', 'prop': 'seller_id'},
					{ 'label': 'Preço', 'prop': 'price_final'},
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