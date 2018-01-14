<template>
	<div class="hb-provider">
		<hb-provider-view></hb-provider-view>
		<hb-provider-create></hb-provider-create>

		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-table"></i> &nbsp LISTAGEM</h4>
			</div>
			<div class="content">
				<data-tables 
					:data="providers" 
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
				      	<a v-on:click="open(scope)"><i class="fa fa-folder"></i></a>
				      </template>
				      
				    </el-table-column>

					<p slot="append">table slot</p>
				</data-tables>
			</div>
		</div>
	</div>
</template>

<style lang="sass">
	.hb-provider
		.btn-create
			margin-bottom: 20px
	.el-dialog__wrapper
		z-index: 6 !important
</style>

<script type="text/javascript">
	import ProviderView from './ProviderViewComponent.vue'
	import ProviderCreate from './ProviderCreateComponent.vue'
	export default {
		components: {
			'hb-provider-view': ProviderView,
			'hb-provider-create': ProviderCreate
		},
		props: ['route-create', 'user_id'],
		data() {
			return {
				settings: {
					bordered: true
				},
				
				provider: {
					name: '',
					cnpj: '',
					email: '',
					phone: ''
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
				{ 'label': 'CNPJ', 'prop': 'cnpj'},
				{ 'label': 'E-mail', 'prop': 'email'},
				{ 'label': 'Telefone', 'prop': 'phone'},
				],
			}
		},
		
		methods: {
			
			open: function (scope) {
				this.$store.commit('set-show-provider', scope.row)
				this.$store.commit('set-show-provider-status', true)
			}
		},

		computed: {

			providers: function () {
				return this.$store.state.providers.data;
			}
		},

		created () {
			this.$store.dispatch('update-providers')
			this.$store.commit('set-user-id', this.user_id)
		}
	}
</script>