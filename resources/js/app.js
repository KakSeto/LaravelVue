require('./bootstrap');
 
window.Vue = require('vue');
 
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './components/App.vue';
import VueSweetalert2 from 'vue-sweetalert2'; 
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
 
Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);
 
import ProdukIndex from './components/ProdukIndex.vue';
import ProdukCreate from './components/ProdukCreate.vue';
import ProdukShow from './components/ProdukShow.vue';
import ProdukEdit from './components/ProdukEdit.vue';
 
const routes = [
  {
      name: 'home',
      path: '/',
      component: ProdukIndex
  },
  {
      name: 'create',
      path: '/produk/create',
      component: ProdukCreate
  },
  {
      name: 'edit',
      path: '/produk/edit/:id',
      component: ProdukEdit
  },
  {
    name: 'show',
    path: '/produk/show/:id',
    component: ProdukShow
}
];
 
const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');