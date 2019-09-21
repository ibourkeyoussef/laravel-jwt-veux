export default [

    {
        path:'/users',
        component:require('./../../views/users/users.vue').default,
        name:'users'
    },

    {
        path:'/user/:id/edit',
        component:require('./../../views/users/edit.vue').default,
        name:'edit'
    },

    {
        path:'/user/create',
        component:require('./../../views/users/create.vue').default,
        name:'store'
    },


]
