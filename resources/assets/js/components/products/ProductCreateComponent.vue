<template>
	<div id="hb-product-create">
		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-pencil-square-o"></i> &nbsp REGISTRO</h4>
			</div>

			<div class="content">
				<div class="row">

					<div class="form-group col-md-4">
						<label>Nome</label>
						<input 
						name="name"
						type="text" 
						v-model="product.name" 
						placeholder="insira o nome" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('name')" class="text-danger">
							{{ errors.first('name') }}
						</span>
					</div>

					<div class="form-group col-md-4">
						<label>Fornecedor</label>
						<select
							name="provider_id"
							type="text" 
							v-model="product.provider_id" 
							placeholder="insira o quantidade" 
							class="form-control"
							v-validate data-vv-rules="required">
							<option v-for="provider in providers" :value="provider.id">{{ provider.name }}</option>
						</select>					
						<span v-show="errors.has('provider')" class="text-danger">
							{{ errors.first('provider') }}
						</span>	
					</div>

					<div class="form-group col-md-4">
						<label>Categoria</label>
						<select 
							name="category_id"
							type="text" 
							v-model="product.category_id" 
							placeholder="insira o categoria" 
							class="form-control"
							v-validate data-vv-rules="required">
							<option v-for="category in categories" :value="category.id">{{ category.name }}</option>
						</select>

						<span v-show="errors.has('category')" class="text-danger">
							{{ errors.first('category') }}
						</span>
					</div>
				</div>

				<div class="row">

					<div class="form-group col-md-3">
						<label>Preço</label>
						<input 
							name="unit_price"
							type="text" 
							v-model="product.unit_price" 
							placeholder="insira o preço" 
							class="form-control"
							v-validate data-vv-rules="required|decimal:2">

						<span v-show="errors.has('unit_price')" class="text-danger">
							{{ errors.first('unit_price') }}
						</span>
					</div>

					<div class="form-group col-md-3">
						<label>Peso (Kilogramas)</label>
						<input 
							name="weight"
							type="text" 
							v-model="product.weight" 
							placeholder="insira o peso" 
							class="form-control"
							v-validate data-vv-rules="required|decimal:4">

						<span v-show="errors.has('weight')" class="text-danger">
							{{ errors.first('weight') }}
						</span>
					</div>

					<div class="form-group col-md-3">
						<label>Quantidade</label>
						<input 
							name="quantity"
							type="text" 
							v-model="product.quantity" 
							placeholder="insira o quantidade" 
							class="form-control"
							v-validate data-vv-rules="required|numeric">

						<span v-show="errors.has('quantity')" class="text-danger">
							{{ errors.first('quantity') }}
						</span>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<label>Descrição</label>
						<textarea
							name="description"
							type="text" 
							v-model="product.description" 
							placeholder="insira a descrição do produto" 
							class="form-control"
							v-validate data-vv-rules="required"
							rows="10">
						</textarea>

						<span v-show="errors.has('description')" class="text-danger">
							{{ errors.first('description') }}
						</span>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<button class="btn btn-success btn-fill" @click="save()"> <i class="fa fa-floppy-o"></i> salvar</button>
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
				product: {},
				
			}
		},

		created () {
			this.$store.dispatch('update-providers')
			this.$store.dispatch('update-categories')
		},
		
		computed: {

			providers: function () {
				console.log(this.$store.state.providers);
				return this.$store.state.providers.data;
			},

			categories: function () {
				console.log(this.$store.state.categories);
				return this.$store.state.categories.data;
			},
		},

		methods: {
			save() {
				
				var dataValidator = {
					name: this.product.name,
					quantity: this.product.quantity,
					unit_price: this.product.unit_price,
					weight: this.product.weight,
					description: this.product.description,
					category_id: this.product.category_id,
					provider_id: this.product.provider_id
					
				}

				this.$validator.validateAll(dataValidator)
				
				.then( result => {

					
					if(result)
					{
						this.$store.dispatch('save-product', this.product)
						this.$store.dispatch('update-products')
						this.$message
						(
						{
							showClose: true,
							message: 'Produto cadastrado com sucesso!',
							type: 'success'
						}
						)
						this.provider = {
							name: '',
							quantity: '',
							unit_price: '',
							weight: '',
							description: '',
							category_id: '',
							provider_id: '',
						}
						this.fase = 0
						
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
				
			}
		}
	}
</script>