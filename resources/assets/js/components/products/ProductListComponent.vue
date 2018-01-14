<template>
	<div class="hb-product-list">
		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-table"></i> &nbsp LISTAGEM</h4>
			</div>
			<div class="content">
				<data-tables 
				:data="products" 
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

				titles: [
				{ 'label': 'Código', 'prop': 'id'},
				{ 'label': 'Nome', 'prop': 'name'},
				{ 'label': 'Preço', 'prop': 'unit_price'},
				{ 'label': 'Peso', 'prop': 'weight'},
				{ 'label': 'Quantidade', 'prop': 'quantity'},
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