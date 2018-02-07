<template>
	<div id="create-provider">

		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-pencil-square-o"></i> &nbsp REGISTRO</h4>
			</div>
			
			<div class="content">

				<el-steps :space="100" :active="fase" finish-status="success">
					<el-step title="Principais"></el-step>
					<el-step title="Endereço"></el-step>
				</el-steps>

				<div v-show="fase == 0">
					<div class="row">
						<div class="form-group col-md-8">
							<label>Nome</label>
							<input 
							type="text"
							name="name" 
							v-model="provider.name" 
							placeholder="insira o nome do fornecedor" 
							class="form-control" 
							v-validate data-vv-rules="required|alpha_spaces">

							<span v-show="errors.has('name')" class="text-danger">
								{{ errors.first('name') }}
							</span>
						</div>

						<div class="form-group col-md-4">
							<label>CNPJ</label>
							<input 
							name="cnpj"
							type="text" 
							v-model="provider.cnpj" 
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
							<label>E-mail</label>
							<input 
							name="email"
							type="text" 
							v-model="provider.email" 
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
							v-model="provider.phone" 
							placeholder="insira o telefone" 
							class="form-control"
							v-validate data-vv-rules="numeric||min:9|max:12">
							<span v-show="errors.has('phone')" class="text-danger">
								{{ errors.first('phone') }}
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<button class="btn btn-default btn-fill" @click="next"> <i class="fa fa-arrow-right"></i> próximo</button>
						</div>	
					</div>
				</div>

				<div v-show="fase == 1">
					<div class="row">
						<div class="form-group col-md-4">
							<label>Estado</label>
							<input 
							name="state"
							type="text" 
							v-model="provider.state" 
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
							v-model="provider.city" 
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
							v-model="provider.district" 
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
							v-model="provider.street" 
							placeholder="insira a rua" 
							class="form-control"
							>
						</div>

						<div class="form-group col-md-4">
							<label>CEP</label>
							<input 
							name="cep"
							type="text" 
							v-model="provider.cep" 
							placeholder="insira o CEP" 
							class="form-control"
							v-validate data-vv-rules="required|min:8|max:8">

							<span v-show="errors.has('cep')" class="text-danger">
								{{ errors.first('cep') }}
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<button class="btn btn-default btn-fill" @click="back"> <i class="fa fa-arrow-left"></i> anterior</button>

							<button class="btn btn-success btn-fill" @click="save"> <i class="fa fa-floppy-o"></i> salvar</button>
						</div>	
					</div>
					
				</div>

				
			</div>
		</div>
</div>


</template>

<script>
	export default {
		data() {
			return {
				provider: {
					name: '',
					email: '',
					cnpj: '',
					phone: '',
					user_id: this.$store.getters.userId
				},
				fase: 0
			}
		},

		methods: {
			next(event) 
			{
				if( this.fase < 1)
				{
					this.fase++
				}

				else
				{
					this.fase = 0
				}

			},

			back(event) 
			{
				if(this.fase > 0)
				{
					this.fase--
				}

				else
				{
					this.fase = 0
				}
			},

			save() {
				
				var dataValidator = {
					name: this.provider.name,
					email: this.provider.email,
					cnpj: this.provider.cnpj,
					phone: this.provider.phone
				}

				this.$validator.validateAll(dataValidator)
				
				.then( result => {

					if(result)
					{
						this.$store.dispatch('save-provider', this.provider)
						this.$store.dispatch('update-providers')
						this.$message
						(
						{
							showClose: true,
							message: 'Fornecedor cadastrado com sucesso!',
							type: 'success'
						}
						)
						this.provider = {
							name: '',
							email: '',
							cnpj: '',
							phone: '',
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
		},

	}
</script>