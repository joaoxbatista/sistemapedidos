<template>
	<div class="hb-category-create">
		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-pencil-square-o"></i> &nbsp REGISTRO</h4>
			</div>
			
			<div class="content">
				<input type="hidden" v-model="category.id" name="id">
				<div class="row">

					<div class="form-group col-md-4">
						<label>Nome</label>
						<input 
						name="name"
						type="text" 
						v-model="category.name" 
						placeholder="insira o nome" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('name')" class="text-danger">
							{{ errors.first('name') }}
						</span>
					</div>

					<div class="form-group col-md-4">
						<label>Cor</label>
						<el-color-picker v-model="category.color" style="display: block"></el-color-picker>
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
						v-model="category.description" 
						placeholder="Uma descrição aqui" 
						class="form-control"
						v-validate data-vv-rules=""
						>
					</textarea> 
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<button class="btn btn-success btn-fill" @click="save"> <i class="fa fa-floppy-o"></i> salvar</button>
				</div>	
			</div>
		</div>
	</div>
</div>
</template>

<script type="text/javascript">
	export default {
		data () {
			return {
				category: {
					name: '',
					description: '',
					color: '#ffffff',
				}
			}
		},

		methods: {
			save() {
				
				var dataValidator = {
					name: this.category.name,
				}

				this.$validator.validateAll(dataValidator)
				
				.then( result => {

					if(result)
					{
						this.$store.dispatch('save-category', this.category)
						this.$store.dispatch('update-categories')
						this.$message
						(
						{
							showClose: true,
							message: 'Categoria cadastrada com sucesso!',
							type: 'success'
						}
						)
						this.category = {
							name: '',
							description: '',
							color: '#ffffff'
							
						}

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
		}
	}
</script>