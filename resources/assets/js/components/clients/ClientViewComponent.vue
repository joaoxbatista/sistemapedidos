<template>
	<div class="hb-client-view" v-show="status">
		<div class="container">
			<button class="btn-close" v-on:click="close()"><i class="fa fa-close"></i></button>
			<div class="header">
				<h4 class="title"><i class="fa fa-pencil-square-o"></i> &nbsp VISUALIZAÇÃO</h4>
			</div>

			<div class="content">
				<div class="row">
					<div class="col-md-12">
						<h5>Informações relativas ao cliente</h5>
					</div>
				</div>

				<div class="row">
					<input type="hidden" v-model="client.id = clientData.id">
					<div class="form-group col-md-4">
						<label>Nome</label>
						<input 
						name="name"
						type="text" 
						v-model="client.name = clientData.name" 
						placeholder="insira o nome" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('name')" class="text-danger">
							{{ errors.first('name') }}
						</span>
					</div>

					<div class="form-group col-md-4">
						<label>CPF</label>
						<input 
						name="cpf"
						type="text" 
						v-model="client.cpf = clientData.cpf" 
						placeholder="insira o CPF" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('cpf')" class="text-danger">
							{{ errors.first('cpf') }}
						</span>
					</div>

					<div class="form-group col-md-4">
						<label>CNPJ</label>
						<input 
						name="cnpj"
						type="text" 
						v-model="client.cnpj = clientData.cnpj" 
						placeholder="insira o CNPJ" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('cnpj')" class="text-danger">
							{{ errors.first('cnpj') }}
						</span>
					</div>

				</div>
				
				<div class="row">
					<div class="form-group col-md-4">
						<label>Limite de crédito</label>
						<input 
						name="limit_credit"
						type="text" 
						v-model="client.limit_credit = clientData.limit_credit" 
						placeholder="insira o limite de crédito" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('limit_credit')" class="text-danger">
							{{ errors.first('limit_credit') }}
						</span>
					</div>

					<div class="form-group col-md-4">
						<label>Telefone</label>
						<input 
						name="phone"
						type="text" 
						v-model="client.phone = clientData.phone" 
						placeholder="insira o telefone" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('phone')" class="text-danger">
							{{ errors.first('phone') }}
						</span>
					</div>

					<div class="form-group col-md-4">
						<label>E-mail</label>
						<input 
						name="email"
						type="text" 
						v-model="client.email = clientData.email" 
						placeholder="insira o e-mail" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('email')" class="text-danger">
							{{ errors.first('email') }}
						</span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<h5>Informações relativas ao endereço</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label for="">Cidade</label>
						<input 
						name="city"
						type="text" 
						v-model="client.city = clientData.city" 
						placeholder="insira a cidade" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('city')" class="text-danger">
							{{ errors.first('city') }}
						</span>
					</div>

					<div class="col-md-4">
						<label for="">Estado</label>
						<input 
						name="state"
						type="text" 
						v-model="client.city = clientData.state" 
						placeholder="insira o estado" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('state')" class="text-danger">
							{{ errors.first('state') }}
						</span>
					</div>
					
				</div>

				<div class="row">
					<div class="col-md-4">
						<label for="">Rua</label>
						<input 
						name="street"
						type="text" 
						v-model="client.street = clientData.street" 
						placeholder="insira a rua" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('street')" class="text-danger">
							{{ errors.first('street') }}
						</span>
						
					</div>
					<div class="col-md-4">
						<label for="">Bairro</label>
						<input 
						name="district"
						type="text" 
						v-model="client.district = clientData.district" 
						placeholder="insira o bairro" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('district')" class="text-danger">
							{{ errors.first('district') }}
						</span>
					</div>
					<div class="col-md-4">
						<label for="">CEP</label>
						<input 
						name="cep"
						type="text" 
						v-model="client.cep = clientData.cep" 
						placeholder="insira o cep" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('cep')" class="text-danger">
							{{ errors.first('cep') }}
						</span>
					</div>
				</div>

				<div class="row" style="margin-top: 20px;">
					<div class="col-md-12">
						<button class="btn btn-fill btn-info" v-on:click="update"> <i class="fa fa-refresh"></i> Atualizar</button>
						<button class="btn btn-fill btn-danger" v-on:click="remove"> <i class="fa fa-trash"></i> Deletar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data () {
		return {
			client: {}
		}
	},

	methods: {

		close () {
			this.$store.commit('set-show-client-status', false);
		},

		remove: function (event) {
			this.$store.dispatch('remove-client', this.client.id)
			this.$store.dispatch('update-clients')
			this.$store.commit('set-show-client-status', false)
			this.$message
			(
			{
				showClose: true,
				message: 'Cliente removido com sucesso',
				type: 'success'
			}
			)
		},

		update: function (event) {

			var dataValidator = {
				name: this.client.name,

			}


			this.$validator.validateAll(dataValidator)

			.then( result => {

				if(result)
				{
					this.$store.dispatch('update-client', dataValidator)
					this.$message
					(
					{
						showClose: true,
						message: 'Cliente atualizado com sucesso!',
						type: 'success'
					}
					)
					this.provider = {
						name: '',
						email: '',
						cnpj: '',
						phone: '',
					}
					this.close()

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

		clientData: function () {
			return this.$store.getters.showClient;
		},

		status () {
			return this.$store.getters.showClientStatus
		},
	}
}
</script>