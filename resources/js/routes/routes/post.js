import Posts from './../../views/post/index.vue'
import AddPost from './../../views/post/create.vue'
import EditPost from './../../views/post/edit.vue'


export default[
    {
        path:'/posts',component:Posts,name:'post-index'
    },

    {
        path:'/post/create',component:AddPost,name:'post-create'
    },

    {
        path:'/post/:id/edit',component:EditPost,name:'post-edit'
    },
]
