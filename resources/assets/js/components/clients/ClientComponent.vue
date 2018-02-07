<template>
	<div id="hb-client">
		<hb-client-view></hb-client-view>
		<hb-client-create></hb-client-create>
		<hb-client-list></hb-client-list>
	</div>
</template>

<script>
	import HBClientListComponent from './ClientListComponent.vue'
	import HBClientCreateComponent from './ClientCreateComponent.vue'
	import HBClientViewComponent from './ClientViewComponent.vue'

	export default {
		components: {
			'hb-client-list': HBClientListComponent,
			'hb-client-create': HBClientCreateComponent,
			'hb-client-view': HBClientViewComponent
		},

		data () {
			return {

			}
		}
	}
</script>