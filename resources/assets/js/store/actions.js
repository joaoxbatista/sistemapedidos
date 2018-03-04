export default 
{
	// Configuração do Negócio
	'get-business-setting' (context)
	{
		
		axios.post('/admin-dashboard/business/setting/json').then(
			response => {
				console.log(response.data)
				
				context.state.business_setting = response.data
				
			}
		)	
	},

	// Fornecedores
	'update-providers' (context) 
	{
		axios.get('/admin-dashboard/providers/json').then(
			response => {
				context.commit('set-providers', response.data)
			}
		)
	},

	'save-provider' (context, provider) 
	{
		axios.post('/admin-dashboard/providers', provider)

		.then(
			response => {
				return true
			}
		)

		.catch(
			erro => {
				return false
			}
		)
	},

	'remove-provider' (context, provider) 
	{
		axios.post('/admin-dashboard/providers/delete', {'id': provider})

		.then(
			response => {
				return true
			}
		)

		.catch(
			erro => {
				return false
			}
		)
	},

	'update-provider' (context, provider)
	{
		axios.put('/admin-dashboard/providers', provider)

		.then(
			response => {
				
			}
		)
		.catch(
			erro => {
				
			}
		)
	},

	//Categorias

	'update-categories' (context) 
	{
		axios.get('/admin-dashboard/categories/json').then(
			response => {
				context.commit('set-categories', response.data)
			}
		)
	},

	'save-category' (context, category) 
	{
		axios.post('/admin-dashboard/categories', category)

		.then(
			response => {
				return true
			}
		)

		.catch(
			erro => {
				return false
			}
		)
	},

	'update-category' (context, category)
	{
		axios.put('/admin-dashboard/categories', category)

		.then(
			response => {
				
			}
		)
		.catch(
			erro => {
				
			}
		)
	},

	'remove-category' (context, category_id)
	{
		axios.post('/admin-dashboard/categories/delete', {id: category_id})
		.then(
			response => {
				
			}
		)
		.catch(
			erro => {
				
			}
		)
	},

	//Produtos

	'update-products' (context)
	{
		axios.get('/admin-dashboard/products/json')
		.then(
			response => {
				context.commit('set-products', response.data)
			}
		)
		.catch(
			erro => {

			}
		)
	},

	'save-product' (context, product) 
	{
		axios.post('/admin-dashboard/products', product)

		.then(
			response => {
				return true
			}
		)

		.catch(
			erro => {
				return false
			}
		)
	},

	'update-product' (context, product)
	{
		axios.post('/admin-dashboard/products', product)

		.then(
			response => {
				
			}
		)
		.catch(
			erro => {
				
			}
		)
	},

	
	'find-has-product' (context, payload) 
	{	
		axios.post('/admin-dashboard/products/find', payload.data)
		.then(
			response => {
				if(response.data != null){

					var productData = {
						product: response.data,
						quantity: payload.data.quantity,
						id: payload.data.product_id
					}

					context.commit('add-item-to-cart', { data: productData, notify: payload.notify})
				}
				else
				{
					payload.notify({
						message: 'O código informado não corresponde a nenhum produto cadastrado!',
						type: 'error'
					});
				}
			}
		)
		.catch(
			erro => {
				payload.notify({
					message: 'Ops, ocorreu algum problema na execução desta tarefa',
					type: 'error'
				});
			}
		)
	},
	
	'remove-product' (context, product_id)
	{
		console.log(product_id)
		axios.post('/admin-dashboard/products/delete', {id: product_id})
		.then(
			response => {
				
			}
		)
		.catch(
			erro => {
				
			}
		)
	},


	//Clientes

	'update-clients' (context)
	{
		axios.get('/admin-dashboard/clients/json')
		.then(
			response => {
				context.commit('set-clients', response.data)
			}
		)
		.catch(
			erro => {

			}
		)
	},

	'save-client' (context, client) 
	{
		axios.post('/admin-dashboard/clients', client)

		.then(
			response => {
				return true
			}
		)

		.catch(
			erro => {
				return false
			}
		)
	},

	'update-client' (context, client)
	{
		axios.post('/admin-dashboard/clients', client)

		.then(
			response => {
				
			}
		)
		.catch(
			erro => {
				
			}
		)
	},

		'find-has-client' (context, payload) 
	{
		
		axios.post('/admin-dashboard/clients/find', payload.data)
		.then(
			(response, result) => {
				if(JSON.stringify(response.data) == JSON.stringify({}))
				{
					payload.notify({
						message: 'Ops, não existe nenhum cliente associado a este código!',
						type: 'error'
					});	
				}
				else
				{
					context.commit('add-client-to-cart', { data: response.data, notify: payload.notify})
				}
			}
		)
		.catch(
			erro => {
				payload.notify({
					message: 'Ops, ocorreu algum problema na execução desta tarefa',
					type: 'error'
				});
			}
		)
	},
	
	'remove-client' (context, client_id)
	{
		axios.post('/admin-dashboard/clients/delete', {id: client_id})
		.then(
			response => {
				
			}
		)
		.catch(
			erro => {
				
			}
		)
	},


	//Pedidos

	'update-orders' (context)
	{
		axios.get('/admin-dashboard/orders/json')
		.then(
			response => {
				context.commit('set-orders', response.data)
			}
		)
		.catch(
			erro => {

			}
		)
	},

	'finish-order' (context, cart)
	{
		
		axios.post('/admin-dashboard/orders/finish', {data: cart})
		.then(
			response => {
				console.log(response.data)			
			}
		)
		.catch(
			erro => {
				console.log(response.erro)	
			}
		)

	},


	'delivery-calculation' (context, payload)
	{
		
		axios.post('/admin-dashboard/orders/delivery/calculation', {destiny: payload.data})
		.then(
			response => {

				
				if(response.data.status != 200)
				{
					console.log(response.data)
					payload.notify({
					message: 'Ops, o endereço do cliente selecionado está incorreto!',
					type: 'error'
				});	
				}
				else
				{
					context.commit('add-delivery-to-cart', { data: response.data, notify: payload.notify} )			
				}
				
			}
		)
		.catch(
			erro => {
				payload.notify({
					message: 'Ops, ocorreu algum problema na execução desta tarefa',
					type: 'error'
				});
			}
		)

	},

	//Bancos

	'update-banks' (context) {
		axios.get('/admin-dashboard/banks/json')
		.then(
			response => {
				context.commit('set-banks', response.data)
			}
		)
		.catch(
			erro => {

			}
		)
	}

}