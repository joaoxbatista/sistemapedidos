export default {
	user: {},
	
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
		product_quantity: 0,
		item_quantity: 0,
		total_price: 0,
		total_weight: 0,
		items: [],
		client: {},
		discount: {},
		parcels: {},
		address: {},
		itemRequest: {
			status: null,
			message: null
		}
	},



}