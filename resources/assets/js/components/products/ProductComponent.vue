<template>
	<div class="hb-product">
		<hb-product-view></hb-product-view>
		<hb-product-create></hb-product-create>
		<hb-product-list></hb-product-list>
	</div>
</template>



<script type="text/javascript">
	import HBProductView from './ProductViewComponent.vue'
	import HBProductList from './ProductListComponent.vue'
	import HBProductCreate from './ProductCreateComponent.vue'

	export default {
		components: {
			'hb-product-view': HBProductView,
			'hb-product-list': HBProductList,
			'hb-product-create': HBProductCreate
		},		
	}
</script>