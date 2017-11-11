// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue';
import App from './App';
import "style-loader!./css/custom.css";
import './vendor/jquery/jquery.min.js';
import './vendor/bootstrap/js/bootstrap.bundle.min.js';
import './vendor/chart.js/Chart.min.js';
import './js/sb-admin.min.js';

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  template: '<App/>',
  components: { App }
})
