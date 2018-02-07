<template>
	<div id="hb-client-create">

		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-pencil-square-o"></i> &nbsp REGISTRO</h4>
			</div>
			<div class="content">
				<div class="row">
					<div class="col-md-12">
						<h5>Informações relativas ao cliente</h5>
					</div>
				</div>
	
				<div class="row">
					<input type="hidden" v-model="client.user_id" value="">
					<div class="form-group col-md-4">
						<label>Nome</label>
						<input 
						name="name"
						type="text" 
						v-model="client.name" 
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
						v-model="client.cpf" 
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
						v-model="client.cnpj" 
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
						v-model="client.limit_credit" 
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
						v-model="client.phone" 
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
						v-model="client.email" 
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
						v-model="client.city" 
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
						v-model="client.state" 
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
						v-model="client.street" 
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
						v-model="client.district" 
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
						v-model="client.cep" 
						placeholder="insira o cep" 
						class="form-control"
						v-validate data-vv-rules="required">

						<span v-show="errors.has('cep')" class="text-danger">
							{{ errors.first('cep') }}
						</span>
					</div>
				</div>

				<div class="row" style="margin-top: 20px;">
					<div class="col-md-4">
						<button class="btn btn-success btn-fill" @click="save()"> <i class="fa fa-floppy-o"></i> salvar</button>
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
		save() {
			this.$store.dispatch('save-client', this.client);
		}
	},

	computed: {
	}
}
</script>