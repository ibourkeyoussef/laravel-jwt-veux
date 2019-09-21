require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes/routes'
import Main from './Main.vue'
import { store } from './_store';
import  VeeValidate from 'vee-validate'
import VueSpinners from 'vue-spinners'

Vue.use(VueSpinners)
Vue.use(VueRouter);
Vue.use(VeeValidate);

const router = new VueRouter({
    routes,
    mode:'history'
})

new Vue({
    render: h => h(Main),
    router,
    store
}).$mount("#app");
