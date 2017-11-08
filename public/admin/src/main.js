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
import './vendor/jquery/jquery.min.js'
import './vendor/bootstrap/js/bootstrap.bundle.min.js'
import './vendor/bootstrap/js/jquery.easing.min.js'
import './vendor/chart.js/Chart.min.js'
import './vendor/datatables/jquery.dataTables.js'
import './js/sb-admin.min.js'
import VuePaginate from 'vue-paginate'
Vue.use(VuePaginate)
Vue.use(VueRouter);

const routes = [
  { path: '/', component: Categories},
  { path: '/categories', component: Categories },
  { path: '/brands', component: Brands },
  { path: '/types', component: Types },
  { path: '/products', component: Products }

];

const router = new VueRouter({
  routes,
  mode: 'history'
})


Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
