<template>
	<div id="hb-client-list">
		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-table"></i> &nbsp LISTAGEM</h4>
			</div>
			<div class="content">
				<data-tables 
				:data="clients" 
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
				{ 'label': 'Nome', 'prop': 'name'},
				{ 'label': 'CPF', 'prop': 'cpf'},
				{ 'label': 'CNPJ', 'prop': 'cnpj'},
				{ 'label': 'Telefone', 'prop': 'phone'},
				{ 'label': 'E-mail', 'prop': 'email'},
				],
			}
		},

		created () {
			this.$store.dispatch('update-clients')
		},

		methods: {
			open: function (scope) {
				this.$store.commit('set-show-client', scope.row)
				this.$store.commit('set-show-client-status', true)
			}
		},

		computed: {

			clients () {
				return this.$store.state.clients.data
			}
		}
	}
</script>