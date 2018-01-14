<template>
	<div class="hb-provider-view" v-show="status">
		<button class="btn-close" v-on:click="close()"><i class="fa fa-close"></i></button>
		<div class="container">
			<div class="header">
				<h4>Informações do fornecedor</h4>
			</div>

			<div class="content">
				<input type="hidden" name="id" v-model="category.id = showCategory.id">
				<div class="row">
					<div class="form-group col-md-4">
						<label>Nome</label>
						<input 
						name="name"
						type="text" 
						v-model="category.name = showCategory.name" 
						placeholder="insira o nome" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('name')" class="text-danger">
							{{ errors.first('name') }}
						</span>
					</div>

					<div class="form-group col-md-4">
						<label>Cor</label>
						<el-color-picker v-model="category.color = showCategory.color" style="display: block"></el-color-picker>
					</div>
				</div>

				<div class="row">

					<div class="form-group col-md-8">
						<label>Descrição</label>
						<textarea 
						name="description"
						type="text" 
						rows="4"
						style="resize: none" 
						v-model="category.description = showCategory.description" 
						placeholder="Uma descrição aqui" 
						class="form-control"
						v-validate data-vv-rules=""
						>
					</textarea> 
				</div>
			</div>

			<button class="btn btn-fill btn-info" v-on:click="update"> <i class="fa fa-refresh"></i> Atualizar</button>
			<button class="btn btn-fill btn-danger" v-on:click="remove"> <i class="fa fa-trash"></i> Deletar</button>
		</div>
	</div>
</div>	
</template>

<script type="text/javascript">
	export default {
		data () {
			return {
				category: {}
			}
		},

		computed: {
			status () {
				return this.$store.getters.showCategoryStatus
			},

			showCategory () {
				return this.$store.getters.showCategory
			}
		},

		methods: {
			remove (event) {
				console.log(this.category.id)
				this.$store.dispatch('remove-category', this.category.id)
				this.$store.dispatch('update-categories')
				this.$store.commit('set-show-category-status', false)
				this.$message
				(
					{
						showClose: true,
						message: 'Categoria removida com sucesso!',
						type: 'success'
					}
				)
			},


			update (event) 
			{
				var dataValidator = {
					name: this.category.name,
				}

				this.$validator.validateAll(dataValidator)
				
				.then( result => {

					if(result)
					{
						this.$store.dispatch('update-category', this.category)
						this.$message
						(
							{
								showClose: true,
								message: 'Categoria atualizada com sucesso!',
								type: 'success'
							}
						)

						this.category = {
							name: '',
							description: '',
							id: '',
							color: '#fff',
						}

						this.$store.commit('set-show-category-status', false)
						
					}
					
					else
					{
						this.$message
						(
						{
							showClose: true,
							message: 'Oops, algo está errado no formulário',
							type: 'error'
						}
						)
					}
				})
			},
			close (event) 
			{
				this.$store.commit('set-show-category-status', false)
			}
		}
	}
</script>