<template>

	<div class="hb-category">
		<hb-category-view></hb-category-view>
		<hb-category-create></hb-category-create>
		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-table"></i> &nbsp LISTAGEM</h4>
			</div>
			<div class="content">
				<!-- <data-tables 
					:data="categories" 
					:table-props="settings" 
					:pagination-def="pagSettings">
					

					<el-table-column 
						v-for="title in titles" 
						:prop="title.prop" 
						:label="title.label" 
						:key="title.label" 
						:width="title.width"
						sortable="custom">
					</el-table-column>

					<el-table-column  label="Cor" width="120">
				      <template slot-scope="scope">
				      	<div class="box" :style="{background: scope.row.color}">
				      	</div>
				      </template>
				    </el-table-column>

					 <el-table-column
				      label="+"
				      width="60">

				      <template slot-scope="scope">
				      	<a v-on:click="open(scope)"><i class="fa fa-folder"></i></a>
				      </template>
				      
				    </el-table-column>

					<p slot="append">table slot</p>
				</data-tables> -->

				<vue-good-table
			      :columns="columns"
			      :rows="categories"
			      :paginate="true"
			      :lineNumbers="true">
				    <template slot="table-row-after" slot-scope="category">
					  <td>
					  	<button v-on:click="open(category)"><i class="fa fa-folder"></i></button>
					  </td>
					</template>
				</vue-good-table>
			</div>
		</div>

	</div>
</template>
<style lang="sass">
	.box
		height: 30px
		width: 30px
		border-radius: 50px
		display: inline-block
</style>
<script type="text/javascript">
	import HBCategoryView from './CategoryViewComponent.vue'
	import HBCategoryCreate from './CategoryCreateComponent.vue'

	export default {
		components: {
			'hb-category-view': HBCategoryView,
			'hb-category-create': HBCategoryCreate
		},

		data () {
			return {
				settings: {
					bordered: true
				},
				
				category: {
					name: '',
					description: '',
					color: '#fff',
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
					{ 'label': 'Ações'},
					
				],
			}
		},

		computed: {
			categories () {
				return this.$store.state.categories.data;
			}
		},

		methods: {
			open (scope) {
				this.$store.commit('set-show-category', scope.row)
				this.$store.commit('set-show-category-status', true)
			},
		},

		created() {
			this.$store.dispatch('update-categories')
			this.$store.commit('set-user-id', this.user_id)
		}
	}
</script>