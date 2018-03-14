<template>
	<div id="hb-client-list">
		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-table"></i> &nbsp LISTAGEM</h4>
			</div>
			<div class="content">
				<!-- <data-tables 
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
				</data-tables> -->

				<vue-good-table
			      :columns="columns"
			      :rows="clients"
			      :paginate="true"
			      :lineNumbers="true">

				    <template slot="table-row-after" slot-scope="client">
					  <td>
					  	<a v-on:click="open(client)" class="open-icon"><i class="fa fa-folder"></i></a>
					  </td>
					</template>
				</vue-good-table>

			</div>
		</div>
	</div>
	</div>
</template>

<script>
	export default {
		data () {
			return {
				
				 columns: [
			        {
			          label: 'Código',
			          field: 'id',
			          filterable: true,
			        },
			        {
			          label: 'Nome',
			          field: 'name',
			          filterable: true,
			        },
			        {
			          label: 'CPF',
			          field: 'cpf', 
			          filterable: true,
			        },
			        {
			        	label: 'Ações'
			        }
			        
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