require('./bootstrap')

window.Vue = require('vue')

//Vee Validade
import VeeValidade from 'vee-validate'
Vue.use(VeeValidade)

//ElementUI Configuration for lang
import lang from 'element-ui/lib/locale/lang/pt-br'
import locale from 'element-ui/lib/locale'

//Moment JS
import moment from "moment";
import VueMomentJS from "vue-momentjs";
Vue.use(VueMomentJS, moment);

locale.use(lang)

//ElementUI Components
import ElementUI from 'element-ui'
//import 'element-ui/lib/theme-default/index.css'
Vue.use(ElementUI)

//Vue Datatable
import Datatables from 'vue-data-tables'
Vue.use(Datatables)



//HBioss Components
import HBAdminLogin from './components/auth/AdminLoginComponent.vue'
import HBProfile from './components/profile/ProfileComponent.vue'

//Componentes para Forncedores
import HBProvider from './components/providers/ProviderComponent.vue'
import HBProviderCreate from './components/providers/ProviderCreateComponent.vue'
import HBProviderView from './components/providers/ProviderViewComponent.vue'

//Componentes para Categorias
import HBCategory from './components/categories/CategoryComponent.vue'

//Componentes para Produtos
import HBProduct from './components/products/ProductComponent.vue'
import HBProductList from './components/products/ProductListComponent.vue'
import HBProductCreate from './components/products/ProductCreateComponent.vue'
import HBProductView from './components/products/ProductViewComponent.vue'

//Components para Pedidos
import HBOrder from './components/orders/OrderComponent.vue'
import HBOrderList from './components/orders/OrderListComponent.vue'

//Component para Configuração do Negócio
import HBBusinessSetting from './components/business-setting/BusinessSettingComponent.vue'

//Component para Clientes
import HBClient from './components/clients/ClientComponent.vue'

import store from './store/store'

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const app = new Vue({
	store,
	name: 'Application',
    el: '#app',
    components: {
 		'hb-profile': HBProfile,
 		'hb-admin-login': HBAdminLogin,
 		
 		'hb-provider': HBProvider,
 		'hb-provider-create': HBProviderCreate,
 		'hb-provider-view': HBProviderView,

 		'hb-category': HBCategory,

 		'hb-product': HBProduct,
 		'hb-product-create': HBProductCreate,
 		'hb-product-view': HBProductView,

 		'hb-order': HBOrder,
 		'hb-order-list': HBOrderList,

 		'hb-business-setting': HBBusinessSetting,

 		'hb-client': HBClient
    }
});
