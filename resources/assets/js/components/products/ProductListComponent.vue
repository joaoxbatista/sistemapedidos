<template>
	<div class="hb-product-list">
		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-table"></i> &nbsp LISTAGEM</h4>
			</div>
			<div class="content">
				<vue-good-table
			      :columns="columns"
			      :rows="products"
			      :paginate="true"
			      :lineNumbers="true">
				    <template slot="table-row-after" slot-scope="product">
					  <td>
					  	<button v-on:click="open(product)" class="open-icon"><i class="fa fa-folder"></i></button>
					  </td>
					</template>
				</vue-good-table>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
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
				{ 'label': 'Código', 'field': 'id', 'filtered': true},
				{ 'label': 'Nome', 'field': 'name', 'filtered': true},
				{ 'label': 'Preço', 'field': 'unit_price', 'filtered': true},
				{ 'label': 'Peso', 'field': 'weight', 'filtered': true},
				{ 'label': 'Quantidade', 'field': 'quantity', 'filtered': true},
				{ 'label': 'Ações'},
				],
			}
		},

		methods: {
			open: function (scope) {
				this.$store.commit('set-show-product', scope.row)
				this.$store.commit('set-show-product-status', true)
			}
		},
		
		computed: {
			products () {
				return this.$store.state.products.data
			}
		},

		created () {
			this.$store.dispatch('update-products')
		}

	}
</script>