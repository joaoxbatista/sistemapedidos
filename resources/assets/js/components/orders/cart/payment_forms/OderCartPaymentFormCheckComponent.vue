<template>
	<div id="order-cart-payment-form-check">
		<div class="header">
			<h4 class="title">Inforamções do cheque</h4>
		</div>
		
		<div class="content">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Número do cheque</label>
						<el-input v-model="check.number"></el-input>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Nome do titular</label>
						<el-input v-model="check.holder_name"></el-input>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>CNPJ</label>
						<el-input v-model="check.cnpj"></el-input>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>CPF</label>
						<el-input v-model="check.cpf"></el-input>
					</div>
				</div>

				<div class="col-md-2">
					<div class="form-group">
						<label>Valor do cheque</label>
						<el-input v-model="check.value"></el-input>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
						<label class="demonstration">Vencimento</label>
						<el-date-picker
					      v-model="check.expiration_date"
					      type="date">
						</el-date-picker>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
						<label>Selecione um banco</label>
						<el-select v-model="check.bank_id" clearable placeholder="Select">
						    <el-option
						      v-for="bank in banks"
						      :key="bank.id"
						      :label="bank.name"
						      :value="bank.id">
						    </el-option>
						 </el-select>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Agencia</label>
						<el-input v-model="check.agency"></el-input>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Número da conta</label>
						<el-input v-model="check.count_number"></el-input>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<button style="margin-top: 22px;" class="btn btn-block btn-success btn-fill" @click="addCheckToCart"><i class="fa fa-plus"></i> Adicionar</button>
				</div>
			</div>

			<div class="row">
				<div v-show="cart.checks.length > 0" class="col-md-12" id="list-checks">
					<div class="header">
						<h4 class="title">Lista de Cheques</h4>
					</div>
					<ul class="list-group">
						<li v-for="checkItem in cart.checks.checks" class="list-group-item">
							<div class="row">
								<p class="col-md-4">
									<i class="fa fa-user"></i> <strong>Número:</strong> {{ checkItem.number}}
								</p>
								<p class="col-md-4">
									<i class="fa fa-user"></i> <strong>Titular:</strong> {{ checkItem.holder_name}}
								</p>
								<p class="col-md-4">
									<i class="fa fa-id-card"></i> <strong>CPF:</strong> {{ checkItem.cpf }}
								</p>
								<p class="col-md-4">
									<i class="fa fa-id-card-o"></i> <strong>CNPJ:</strong> {{ checkItem.cnpj }}
								</p>
								<p class="col-md-4">
									<i class="fa fa-money"></i> <strong>Valor:</strong> {{ checkItem.value}} 
								</p>
								<p class="col-md-4">
									<i class="fa fa-university"></i> <strong>Banco:</strong> {{ getNameBank(checkItem)[0].name }}
								<p class="col-md-4">
									<i class="fa fa-credit-card"></i> <strong>Agencia:</strong> {{ checkItem.agency }}
								</p>

								<p class="col-md-4">
									<i class="fa fa-credit-card-alt"></i> <strong>Número da conta:</strong> {{ checkItem.count_number }}
								</p>

								<p class="col-md-4">
									<i class="fa fa-calendar"></i> <strong>Data de validade:</strong> {{ $moment(checkItem.expiration_date).format('DD/MM/YYYY') }}
								</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data () {
			return {
				check: { 
					number: null,
					bank_id: null,
					expiration_date: null,
					holder_name: null,
					cnpj: null,
					cpf: null,
					agency: null,
					count_number: null,
				},
			}
		},

		methods: {
			addCheckToCart() {

				var payload = {
					data: JSON.parse(JSON.stringify(this.check)),
					notify: this.$message
				}

				this.$store.commit('add-check-to-cart', payload)
			},

			getNameBank(check) {
				return this.banks.filter( 
					bank => {
					if(bank.id == check.bank_id)
					{
						return bank
					}
				})
			}

		},

		computed: {
			cart () {
				return this.$store.getters.getCart;
			},

			banks () {
				return this.$store.getters.getBanks;
			}
		}
	}
</script>