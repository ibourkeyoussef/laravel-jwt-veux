import Vue from 'vue'
import Vuex from 'vuex'

import {users} from './_modules/users'
import {post} from './_modules/post'
import createPersistedState from 'vuex-persistedstate'



Vue.use(Vuex);

export const store = new Vuex.Store({

    plugins: [createPersistedState()],
    modules: {
        users,
        post
    }
});
