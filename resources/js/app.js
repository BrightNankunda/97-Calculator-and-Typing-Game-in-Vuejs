require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import routes from './routes.js';
import store from './store/index';
// import Home from './components/Home';

import { BootstrapVue } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.component('Home', require('./components/Home').default);
Vue.use(BootstrapVue)

Vue.use(VueRouter);

const router = new VueRouter(
    routes
)
const app = new Vue({
    el: '#app',
    store,
    router
});
