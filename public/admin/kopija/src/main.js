// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueRouter from 'vue-router';
import App from './App'
import Master from './components/Master'
import Categories from './components/Categories'
import Brands from './components/Brands'
import Types from './components/Types'
import Products from './components/Products'
import Colors from './components/Colors'
import Orders from './components/Orders'
import CustomCase from './components/CustomCase'
import Slider from './components/Slider'
import Delivery from './components/Delivery'
import Special from './components/Special'
import './vendor/jquery/jquery.min.js'
import './vendor/bootstrap/js/bootstrap.bundle.min.js'
import './vendor/bootstrap/js/jquery.easing.min.js'
import './vendor/chart.js/Chart.min.js'
import './vendor/datatables/jquery.dataTables.js'
import './js/sb-admin.min.js'
import './js/config.js'
import '../node_modules/vue-wysiwyg/dist/vueWysiwyg.css';
import VuePaginate from 'vue-paginate'
import wysiwyg from "vue-wysiwyg"
Vue.use(wysiwyg, {
  hideModules: { "image":true, "table":true, "removeFormat":true }
});
Vue.use(VuePaginate)
Vue.use(VueRouter)


const routes = [
  { path: '/', component: Categories},
  { path: '/categories', component: Categories },
  { path: '/brands', component: Brands },
  { path: '/types', component: Types },
  { path: '/products', component: Products },
  { path: '/colors', component: Colors},
  { path: '/orders', component: Orders},
  { path: '/custom-case', component: CustomCase},
  { path: '/slider', component: Slider},
  { path: '/delivery', component: Delivery},
  { path: '/special', component: Special}

];


const router = new VueRouter({
  routes,
  mode: 'history'
})
window.base_url = 'http://localhost/blacksheep/public/index.php/admin';
// window.base_url = 'http://admin.blacksheepmobstore.com';
Vue.config.productionTip = false

/* eslint-disable no-new */

new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App },
})
