<template>
	<div class="hb-provider-view" v-show="status">
		<button class="btn-close" v-on:click="close()"><i class="fa fa-close"></i></button>
		<div class="container">
			<div class="header">
				<h4>Informações do fornecedor</h4>
			</div>

			<div class="content">
				<div class="row">
					<input type="hidden" v-model="provider.id = showProvider.id">

					<div class="form-group col-md-8">
						<label>* Nome</label>
						<input 
						type="text"
						name="name"
						v-model="provider.name = showProvider.name" 
						placeholder="insira o nome do fornecedor" 
						class="form-control" 
						v-validate data-vv-rules="required|alpha_spaces">

						<span v-show="errors.has('name')" class="text-danger">
							{{ errors.first('name') }}
						</span>
					</div>

					<div class="form-group col-md-4">
						<label>* CNPJ</label>
						<input 
						name="cnpj"
						type="text" 
						v-model="provider.cnpj = showProvider.cnpj" 
						placeholder="insira o cnpj" 
						class="form-control"
						v-validate data-vv-rules="required|min:14|max:14">

						<span v-show="errors.has('cnpj')" class="text-danger">
							{{ errors.first('cnpj') }}
						</span>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-8">
						<label>* E-mail</label>
						<input 
						name="email"
						type="text"
						v-model="provider.email = showProvider.email" 
						placeholder="insira o e-mail" 
						class="form-control"
						v-validate data-vv-rules="required|email">

						<span v-show="errors.has('email')" class="text-danger">
							{{ errors.first('email') }}
						</span>
					</div>

					<div class="form-group col-md-4">
						<label>Telefone</label>
						<input 
						name="phone"
						type="text"
						v-model="provider.phone = showProvider.phone" 
						placeholder="insira o telefone" 
						class="form-control"
						v-validate data-vv-rules="numeric||min:9|max:12">
						<span v-show="errors.has('phone')" class="text-danger">
							{{ errors.first('phone') }}
						</span>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-4">
						<label>Estado</label>
						<input 
						name="state"
						type="text" 
						v-model="provider.state = showProvider.state" 
						placeholder="insira o estado" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('state')" class="text-danger">
							{{ errors.first('state') }}
						</span>
					</div>

					<div class="form-group col-md-4">
						<label>Cidade</label>
						<input 
						name="city"
						type="text" 
						v-model="provider.city = showProvider.city" 
						placeholder="insira a cidade" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('city')" class="text-danger">
							{{ errors.first('city') }}
						</span>
					</div>

					<div class="form-group col-md-4">
						<label>Bairro</label>
						<input 
						name="district"
						type="text" 
						v-model="provider.district = showProvider.district" 
						placeholder="insira o bairro" 
						class="form-control"
						>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-4">
						<label>Rua</label>
						<input 
						name="street"
						type="text" 
						v-model="provider.street = showProvider.street" 
						placeholder="insira a rua" 
						class="form-control"
						>
					</div>

					<div class="form-group col-md-4">
						<label>CEP</label>
						<input 
						name="cep"
						type="text" 
						v-model="provider.cep = showProvider.cep" 
						placeholder="insira o CEP" 
						class="form-control"
						v-validate data-vv-rules="required|min:8|max:8">

						<span v-show="errors.has('cep')" class="text-danger">
							{{ errors.first('cep') }}
						</span>
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
		props: ['data'],
		data () {
			return {

				provider: {
					id: '',
					name: '',
					cnpj: '',
					email: '',
					phone: '',
					cep: '',
					state: '',
					city: ''
				}
			}
		},

		methods: {
			close: function (event) {
				this.$store.commit('set-show-provider-status', false)
			},

			remove: function (event) {
				this.$store.dispatch('remove-provider', this.provider.id)
				this.$store.dispatch('update-providers')
				this.$store.commit('set-show-provider-status', false)
				this.$message
				(
				{
					showClose: true,
					message: 'Fornecedor removido com sucesso',
					type: 'success'
				}
				)
			},

			update: function (event) {

				var dataValidator = {
					name: this.provider.name,
					email: this.provider.email,
					cnpj: this.provider.cnpj,
					phone: this.provider.phone,
					cep: this.provider.cep,
					city: this.provider.city,
					state: this.provider.state
				}

				this.$validator.validateAll(dataValidator)
				
				.then( result => {

					if(result)
					{
						this.$store.dispatch('update-provider', this.provider)
						this.$message
						(
						{
							showClose: true,
							message: 'Fornecedor atualizado com sucesso!',
							type: 'success'
						}
						)
						this.provider = {
							name: '',
							email: '',
							cnpj: '',
							phone: '',
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

				
			}


		},

		computed: {
			status () {
				return this.$store.getters.showProviderStatus
			},
			showProvider() {
				return this.$store.getters.showProvider
			}
		},


	}
</script>