export const users = {

     state : {
        logged: localStorage.getItem('token'),

    },

     getters : {
        isLogged: state => state.logged
    },

     actions : {
        login ( user) {
alert(user)
        },

        logout({commit}) {

        }
    },

     mutations : {
        // [types.LOGIN] (state) {
        //     state.logged = 1;
        // },

        // [types.LOGOUT] (state) {
        //     state.logged = 0;
        // }
    }

}


