<template>
	<div class="hb-order">
		<hb-order-create></hb-order-create>
	</div>
</template>



<script type="text/javascript">
	// import HBOrderView from './OrderViewComponent.vue'
	// import HBOrderList from './OrderListComponent.vue'
	import HBOrderCreate from './OrderCreateComponent.vue'


	export default {
		components: {
			// 'hb-order-view': HBOrderView,
			// 'hb-order-list': HBOrderList,
			'hb-order-create': HBOrderCreate
		},		
	}
</script>