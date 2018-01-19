export default {

	//Usuário
	'set-user-id' (state, user_id) {
		state.user.id = user_id
	},

	//Fornecedores
	'set-providers' (state, providers) {
		state.providers.data = providers
	},

	'set-request-provider-message' (state, message) {
		state.providers.request.message = message
	},

	'set-show-provider' (state, provider) {
		state.providers.show.data = provider
	},

	'set-show-provider-status' (state, status) {
		state.providers.show.status = status
	},

	//Clientes
	'set-clients' (state, clients) {
		state.clients.data = clients
	},

	'set-request-clients-message' (state, message) {
		state.clients.request.message = message
	},

	'set-show-client' (state, client) {
		state.clients.show.data = client
	},

	'set-show-client-status' (state, status) {
		state.clients.show.status = status
	},
	
	//Categorias

	'set-categories' (state, categories) {
		state.categories.data = categories
	},

	'set-request-category-message' (state, message) {
		state.categories.request.message = message
	},

	'set-show-category' (state, category) {
		state.categories.show.data = category
	},

	'set-show-category-status' (state, status) {
		state.categories.show.status = status
	},

	//Produtos

	'set-products' (state, products) {
		state.products.data = products
	},

	'set-request-product-message' (state, message) {
		state.products.request.message = message
	},

	'set-show-product' (state, product) {
		state.products.show.data = product
	},

	'set-show-product-status' (state, status) {
		state.products.show.status = status
	},

	//Pedidos

	'add-item-to-cart' (state, payload) {

		//Status para verificar se o produto existe ou não no carrinho
		var item = payload.data
		var status = false

		//Verifica se o item existe no carrinho
		state.cart.items.filter(element => {

			//Se o id do item for igual ao item informado ele adiciona a quantidade ao item existente
			if(item.id == element.id)
			{
				if((parseInt(element.quantity) + parseInt(item.quantity)) > parseInt(item.product.quantity))
				{
					payload.notify({
						showClose: true,
						message: 'A quantidade solicitada excede o estoque! Quantidade disponível é igual a: '+item.product.quantity,
						type: 'warning'
					})

					// state.cart.itemRequest.status = 'warning'
					// state.cart.itemRequest.message = 'A quantidade solicitada excede o estoque! Quantidade disponível é igual a: '+item.product.quantity
					status = true

				}
				else{
					element.quantity = parseInt(element.quantity)+parseInt(item.quantity)
					status = true	

					var total_price = (item.quantity * item.product.unit_price) + state.cart.total_price
					total_price = parseFloat(total_price.toFixed(2))

					var total_weight = (item.quantity * item.product.weight) + state.cart.total_weight
					total_weight = parseFloat(total_weight.toFixed(2))

					state.cart.item_quantity += parseInt(item.quantity)
					state.cart.total_price = total_price
					state.cart.price_with_discount = total_price
					state.cart.total_weight = total_weight

					payload.notify({
						showClose: true,
						message: item.quantity + ' unidade(s) de ' + item.product.name + ' adicionada(s) com sucesso!',
						type: 'success'
					})
					// state.cart.itemRequest.status = 'success'
					// state.cart.itemRequest.message = item.quantity + ' unidade(s) de ' + item.product.name + ' adicionada(s) com sucesso!'
				}
				
			}
		})

		//Caso o produto não exista no carrinho o mesmo é adicionado
		if(!status)
		{
			if(parseInt(item.quantity) > parseInt(item.product.quantity))
			{
				
				payload.notify({
					showClose: true,
					message: 'A quantidade solicitada excede o estoque! Quantidade disponível é igual a: '+item.product.quantity,
					type: 'warning'
				})
				// state.cart.itemRequest.status = 'warning'
				// state.cart.itemRequest.message = 'A quantidade solicitada excede o estoque! Quantidade disponível é igual a: '+item.product.quantity
			}
			else
			{
				state.cart.items.push(item)
				state.cart.product_quantity +=  1

				var total_price = (item.quantity * item.product.unit_price) + state.cart.total_price
				total_price = parseFloat(total_price.toFixed(2))

				var total_weight = (item.quantity * item.product.weight) + state.cart.total_weight
				total_weight = parseFloat(total_weight.toFixed(2))

				state.cart.item_quantity += parseInt(item.quantity)
				state.cart.total_price = total_price
				state.cart.price_with_discount = total_price
				state.cart.total_weight = total_weight

				payload.notify({
					showClose: true,
					message: item.quantity + ' unidade(s) de ' + item.product.name + ' adicionada(s) com sucesso!',
					type: 'success'
				})
			}
			
		}
	},

	'remove-item-to-cart' (state, item) {
		let index = state.cart.items.indexOf(item)
		state.cart.items.splice(index, 1);

		var total_price = state.cart.total_price - (item.quantity * item.product.unit_price) 
		total_price = parseFloat(total_price.toFixed(2))

		var total_weight = state.cart.total_weight - (item.quantity * item.product.weight)
		total_weight = parseFloat(total_weight.toFixed(2))

		state.cart.item_quantity -= parseInt(item.quantity)
		state.cart.total_price = total_price
		state.cart.price_with_discount = total_price
		state.cart.total_weight = total_weight
	},

	'clear-cart' (state) {
		state.cart = {
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
		}
	},

	'add-client-to-cart' (state, client) {
		state.cart.client = client
	},

	'add-discount-to-cart' (state, payload) {
		state.cart.discount = payload.data
		state.cart.price_with_discount = payload.data.price_with_discount
		payload.notify({
			showClose: true,
			message: 'Disconto adicionado com sucesso! ' + payload.data.discount,
			type: 'success'
		})
	},

	'add-check-to-cart' (state, payload) {

		var check = payload.data
		state.cart.checks.push(check)

		payload.notify({
			showClose: true,
			message: 'Foi adicionado um cheque no valor de '+check.value+' R$',
			type: 'success'
		})
	},

	'add-delivery-to-cart' (state, payload) {
		state.cart.delivery = payload.data
		payload.notify({
			showClose: true,
			message: 'Frete adicionado com sucesso!',
			type: 'success'
		})
	},

	'clear-item-request-cart' (state) {

		state.cart.itemRequest = {
			status: '',
			message: ''
		}
	},

	//Bancos
	'set-banks' (state, banks) {
		state.banks = banks
	},

}