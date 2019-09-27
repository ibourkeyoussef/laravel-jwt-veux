import { store } from './_store';
import routes from './routes/routes'
require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'

import Main from './Main.vue'
import  VeeValidate from 'vee-validate'
import VueSpinners from 'vue-spinners'
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueSpinners)
Vue.use(VueRouter);
Vue.use(VeeValidate);

const router = new VueRouter({
    routes,
    mode:'history'
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.secure)) {
      // if no token
      if (!store.state.users.loggedIn) {
        //console.log("no token");
        next({
          path: "/login"
        });
      } else {
        next();
      }
    } else if (to.matched.some(record => record.meta.guest)) {
      if (!store.state.users.loggedIn) {
        next();
      } else {
        //console.log("no token");
        next({

          path: "/posts"
        });
      }
    } else {
      next();
    }
  });
// const store = `Bearer ${store.state.users.token}`;
// window.axios.defaults.headers.common['Authorization'] = store;
new Vue({
    render: h => h(Main),
    router,
    store
}).$mount("#app");
