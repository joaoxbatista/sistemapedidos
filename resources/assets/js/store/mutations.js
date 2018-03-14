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

	'set-cart-payment-form-first' (state, data)
	{
		state.cart.payment_forms.first = data
		//Remover o valor anterior
		//Adicionar o novo valor ao total
	},

	'set-cart-payment-form-secondary' (state, payment_form)
	{
		state.cart.payment_forms.second = payment_form
		//Remover o valor anterior
		//Adicionar o novo valor ao total
	},

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
	'set-orders' (state, orders)
	{
		state.orders.data = orders
	},

	'set-cart-payment-form-money' (state, money)
	{
		state.cart.money = money
	},

	'add-item-to-cart' (state, payload) {
		//Status para verificar se o produto existe ou não no carrinho
		var item = payload.data
		var status = false

		//Verifica se o item existe no carrinho
		state.cart.items.filter(element => {

			//Se o id do item for igual ao item informado
			if(item.id == element.id)
			{
				//Caso a quantidade solicitada seja maior que a do estoque, sera retornada uma messagem de erro
				if((parseInt(element.quantity) + parseInt(item.quantity)) > parseInt(item.product.quantity))
				{
					payload.notify({
						showClose: true,
						message: 'A quantidade solicitada excede o estoque! Quantidade disponível é igual a: '+item.product.quantity,
						type: 'warning'
					})

					status = true //Diz que o produto já existe no carrinho

				}
				//Caso a quantidade solicitada não seja maior que a do estoque, o item sera adicionado no carrinho	
				else{
					
					element.quantity = parseInt(element.quantity) + parseInt(item.quantity)
					
					element.subtotal_price = (item.quantity * item.product.unit_price) + element.subtotal_price
					element.subtotal_price = parseFloat(element.subtotal_price.toFixed(2))

					element.subtotal_weight = (item.quantity * item.product.weight) + element.subtotal_weight
					element.subtotal_weight = parseFloat(element.subtotal_weight.toFixed(2))

					var price_products = (item.quantity * item.product.unit_price) + state.cart.price_products
					price_products = parseFloat(price_products.toFixed(2))

					var total_weight = (item.quantity * item.product.weight) + state.cart.total_weight
					total_weight = parseFloat(total_weight.toFixed(2))

					element.total_price = element.subtotal_price

					//Atualiza a quantidade dos items do carrinho
					state.cart.item_quantity += parseInt(item.quantity)
					//Atualiza o valor dos items no carrinho
					state.cart.price_products = price_products
					//Atualiza o valor do disconto no carrinho
					state.cart.price_discount = price_products
					//Atualiza o valor total a ser pago no carrinho
					state.cart.price_final = price_products
					//Atualiza o peso total no carrinho
					state.cart.total_weight = total_weight

					status = true //Diz que o produto já existe no carrinho

					payload.notify({
						showClose: true,
						message: item.quantity + ' unidade(s) de ' + item.product.name + ' adicionada(s) com sucesso!',
						type: 'success'
					})
				}
				
			}
		})

		//Caso o produto não exista no carrinho
		if(!status)
		{
			//Caso a quantidade solicitada seja maior que a do estoque sera retornada uma messagem de erro
			if(parseInt(item.quantity) > parseInt(item.product.quantity))
			{
				payload.notify({
					showClose: true,
					message: 'A quantidade solicitada excede o estoque! Quantidade disponível é igual a: '+item.product.quantity,
					type: 'warning'
				})
			}

			//Caso a quantidade solicitada não seja maior que a do estoque,o item sera adicionado no carrinho	
			else
			{
				item.subtotal_price = item.quantity * item.product.unit_price
				item.subtotal_price = parseFloat(item.subtotal_price.toFixed(2))

				item.subtotal_weight = item.quantity * item.product.weight
				item.subtotal_weight = parseFloat(item.subtotal_weight.toFixed(2))

				item.discount = 0
				item.total_price = item.subtotal_price

				state.cart.items.push(item)
				state.cart.product_quantity +=  1

				var price_products = item.subtotal_price + state.cart.price_products
				price_products = parseFloat(price_products.toFixed(2))

				var total_weight = item.subtotal_weight + state.cart.total_weight
				total_weight = parseFloat(total_weight.toFixed(2))

				state.cart.item_quantity += parseInt(item.quantity)
				state.cart.price_products = price_products
				state.cart.price_discount = price_products
				state.cart.price_final = price_products
				state.cart.total_weight = total_weight

				payload.notify({
					showClose: true,
					message: item.quantity + ' unidade(s) de ' + item.product.name + ' adicionada(s) com sucesso!',
					type: 'success'
				})
			}}
	},

	'remove-item-to-cart' (state, item) {
		var index = state.cart.items.indexOf(item)

		var price_products = state.cart.price_products - item.subtotal_price
		price_products = parseFloat(price_products.toFixed(2))

		var total_weight = state.cart.total_weight - item.subtotal_weight
		total_weight = parseFloat(total_weight.toFixed(2))

		state.cart.item_quantity -= parseInt(item.quantity)
		state.cart.price_products = price_products
		state.cart.price_discount = price_products
		state.cart.price_final = price_products

		state.cart.total_weight = total_weight

		state.cart.items.splice(index, 1)
	},

	'clear-cart' (state) {
		state.cart = {
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
			parcels: [],
			checks: [],
			
			/*Dados relativos ao desconto*/
			discounts: {
				items: [],
				total: 0,
			},

			/*Dados relativos aos preços*/
			price_products: 0,
			price_discount: 0,
			price_delivery: 0,
			price_final: 0,
		}
	},

	'set-cart-payment-form' (state, payload)
	{
		state.cart.payment_form = payload.data
		payload.notify({
			message: 'Forma de pagamento selecionada com sucesso!',
			type: 'success'
		});
	},

	'set-cart-parcels' (state, installment)
	{
		state.cart.installment.parcels = installment.parcels
		state.cart.installment.total = installment.value
	},

	'add-client-to-cart' (state, payload) {
		state.cart.client = payload.data
		payload.notify({
			message: 'Cliente selecionado com sucesso!',
			type: 'success'
		});	

	},

	'remove-client-to-cart' (state, notify) {
		state.cart.client = {}
		notify({
			message: 'Cliente removido com sucesso!',
			type: 'success'
		});	

	},

	'add-discount-to-cart' (state, payload) {

		state.cart.discounts.total = parseFloat(payload.data.price)
		state.cart.discounts.total = state.cart.discounts.total.toFixed(2)
				
		state.cart.price_final = parseFloat(state.cart.price_final) - parseFloat(state.cart.discounts.total)
		state.cart.price_final = state.cart.price_final.toFixed(2)

		payload.notify({
			showClose: true,
			message: 'Disconto adicionado com sucesso! ',
			type: 'success'
		})
	},

	'add-discount-item-to-cart' (state, data) {
		var status = false
		var item = data.item

		state.cart.discounts.items.filter( itemCart => {
			if(itemCart.product.id == item.product.id)
			{	

				state.cart.discounts.total = parseFloat(state.cart.discounts.total) - parseFloat(itemCart.discount)
				state.cart.discounts.total = state.cart.discounts.total.toFixed(2)

				itemCart.discount = parseFloat(data.discount)

				state.cart.discounts.total = parseFloat(state.cart.discounts.total) + parseFloat(itemCart.discount)
				state.cart.discounts.total = state.cart.discounts.total.toFixed(2)

				state.cart.price_final = parseFloat(state.cart.price_final) -  parseFloat(state.cart.discounts.total)
				state.cart.price_final.toFixed(2)
				
				itemCart.total_price = parseFloat(itemCart.subtotal_price) - parseFloat(itemCart.discount)
				itemCart.total_price = itemCart.total_price.toFixed(2)

				status = true
			}	
		})

		if(!status)
		{	
			item.discount = data.discount

			item.total_price = parseFloat(item.subtotal_price) - parseFloat(item.discount)
			item.total_price = item.total_price.toFixed(2)

			state.cart.discounts.total = parseFloat(state.cart.discounts.total) + parseFloat(item.discount)
			state.cart.discounts.total.toFixed(2)

			state.cart.price_final = parseFloat(state.cart.price_final) -  parseFloat(state.cart.discounts.total)
			state.cart.price_final.toFixed(2)

			state.cart.discounts.items.push(item)
		}
	},

	'remove-discount-to-cart' (state, payload) {

		state.cart.price_final = parseFloat(state.cart.price_final) +  parseFloat(state.cart.discounts.total)
		state.cart.price_final.toFixed(2)

		state.cart.discounts.total = 0

		payload.notify({
			showClose: true,
			message: 'Disconto removido com sucesso! ',
			type: 'success'
		})
	},

	'add-check-to-cart' (state, payload) {

		var check = payload.data
		state.cart.checks.checks.push(check)

		payload.notify({
			showClose: true,
			message: 'Foi adicionado um cheque no valor de '+check.value+' R$',
			type: 'success'
		})
	},

	'add-delivery-to-cart' (state, payload) {
		var delivery = payload.data

		state.cart.price_final = parseFloat(state.cart.price_final) - parseFloat(state.cart.price_delivery)
		state.cart.price_final = state.cart.price_final.toFixed(2)

		state.cart.price_delivery = 0
		state.cart.price_delivery = parseFloat(delivery.price)
		state.cart.price_delivery = state.cart.price_delivery.toFixed(2)

		state.cart.price_final = parseFloat(state.cart.price_final) + parseFloat(state.cart.price_delivery)
		state.cart.price_final = state.cart.price_final.toFixed(2)

		state.cart.delivery = delivery

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

	'clear-cart-payment-form-first' (state) {
		state.cart.payment_forms.total_input = parseFloat(state.cart.payment_forms.total_input) - parseFloat(state.cart.payment_forms.first.total)
		state.cart.payment_forms.total_input = state.cart.payment_forms.total_input.toFixed(2)
		state.cart.payment_forms.first.selected = null
		state.cart.payment_forms.first.total = 0
		console.log(JSON.stringify(state.cart.payment_forms))
	} ,

	'clear-cart-payment-form-second' (state) {
		state.cart.payment_forms.total_input = parseFloat(state.cart.payment_forms.total_input) - parseFloat(state.cart.payment_forms.second.total)
		state.cart.payment_forms.total_input = state.cart.payment_forms.total_input.toFixed(2)
		state.cart.payment_forms.second.selected = null
		state.cart.payment_forms.second.total = 0
		console.log(JSON.stringify(state.cart.payment_forms))
	} ,

	//Bancos
	'set-banks' (state, banks) {
		state.banks = banks
	},

}