export default 
{
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

	'find-has-product' (context, item) 
	{
		
		axios.post('/admin-dashboard/products/find', item)
		.then(
			response => {
				var productData = {
					product: response.data,
					quantity: item.quantity,
					id: item.product_id
				}

				context.commit('add-item-to-cart', productData)
			}
		)
		.catch(
			erro => {
				context.commit('add-item-to-cart-fail')
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



	//Produtos

	'update-client' (context)
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

	'save-product' (context, product) 
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

	'find-has-client' (context, code) 
	{
		
		axios.post('/admin-dashboard/clients/find', {cpf: code, id: code})
		.then(
			(response, result) => {
				context.commit('add-client-to-cart', response.data)
			}
		)
		.catch(
			erro => {
				return erro
			}
		)
	},
	
	'remove-client' (context, client_id)
	{
		console.log(product_id)
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

}