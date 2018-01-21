<template>
	<div id="hb-business-setting">
		<div class="card">
			<div class="header">
				<h4 class="title"><i class="fa fa-pencil-square-o"></i> &nbsp CONFIGURAÇÃO DO NEGÓCIO</h4>
			</div>

			<div class="content">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Nome do negócio</label>
							<input type="text" v-model="business.name = business_setting.name" class="form-control">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>CNPJ</label>
							<input type="text" v-model="business.cnpj = business_setting.cnpj" class="form-control">
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label>Cidade</label>
							<input type="text" v-model="business.city = business_setting.city" class="form-control">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Estado</label>
							<input type="text" v-model="business.state = business_setting.state" class="form-control">
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label>Rua</label>
							<input type="text" v-model="business.street = business_setting.street" class="form-control">
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label>Bairro</label>
							<input type="text" v-model="business.district = business_setting.district" class="form-control">
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label>CEP</label>
							<input type="text" v-model="business.cep = business_setting.cep" class="form-control">
						</div>
					</div>	
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Valor do Kilometro</label>
							<input type="text" v-model="business.kilometer_value = business_setting.kilometer_value" class="form-control">
						</div>
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
				business: {

				}
			}
		},

		created () {
			this.$store.dispatch('get-business-setting');
		},

		computed: {
			business_setting() {
				return this.$store.getters.getBusinessSetting;
			}
		}
	}
</script>