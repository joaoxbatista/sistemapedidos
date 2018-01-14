export default {
	userId: function (state) {
		return state.user.id
	},

	showProviderStatus: function (state) {
		return state.providers.show.status
	},

	showProvider: function (state) {
		return state.providers.show.data
	},

	showCategory: function (state) {
		return state.categories.show.data
	},

	showCategoryStatus: function (state) {
		return state.categories.show.status
	},

	showProduct: function (state) {
		return state.products.show.data
	},

	showProductStatus: function (state) {
		return state.products.show.status
	},

	getCart: function (state) {
		return state.cart
	},

	getItemsCart: function (state) {
		return state.cart.items
	},

}