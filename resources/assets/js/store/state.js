export default {
	user: {},
	
	business_setting: {},
	
	providers: {
		data: [],

		show: {
			status: false,
			data: {}
		},

		request: {
			message: ''
		}
	},

	banks: [
	],

	categories: {
		data: [],

		show: {
			status: false,
			data: {}
		},

		request: {
			message: ''
		}
	},

	products: {
		data: [],

		show: {
			status: false,
			data: {}
		},

		request: {
			message: ''
		}
	},

	clients: {
		data: [],

		show: {
			status: false,
			data: {}
		},

		request: {
			message: ''
		}
	},

	cart: {
		/*Dados relativos ao cliente*/
		client: {},
		
		/*Dados relativos aos produtos*/
		product_quantity: 0,
		item_quantity: 0,
		items: [],
		
		/*Dados relativos a entrega*/
		total_weight: 0,
		delivery: {},

		/*Dados relativos a forma de pagamento*/		
		payment_forms: {
			//Primeira forma de pagamentos
			first: {
				selected: null,
				total: 0
			},
			//Segunda forma de pagamentos
			second: { 
				selected: null,
				total: 0
			},
			total_input: 0, //Valor total das formas de pagamento 
			total_debet: 0, //Valor que falta par acompletar o pagamento
			quantity: 0, //Quantidade das formas de pagamento
		},

		// Dados relativos ao dinheiro
		money: 0,

		// Dados relativos ao parcelamento
		installment: {
			parcels: [],
			total: 0
		},

		// Dados relativos aos cheques
		checks: {
			checks: [],
			total: 0
		},
		
		// Dados relativos ao desconto
		discounts: {
			items: [],
			total: 0,
		},

		// Dados relativos aos preços
		price_products: 0,
		price_discount: 0,
		price_delivery: 0,
		price_final: 0,

	},



}