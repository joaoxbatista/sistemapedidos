export default {
	user: {},
	
	business_setting: {},

	orders: {
		data: [],

		show: {
			status: false,
			data: {}
		},

		request: {
			message: ''
		}
	},

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
		payment_form: '',

		// Dados relativos ao parcelamento
		installment: {
			parcels: [],
			total: 0
		},

		// Dados relativos aos cheques
		check: {},
		
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