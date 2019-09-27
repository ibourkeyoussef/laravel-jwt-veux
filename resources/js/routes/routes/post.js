import Posts from './../../views/post/index.vue'
import AddPost from './../../views/post/create.vue'
import EditPost from './../../views/post/edit.vue'
import ShowPost from './../../views/post/show.vue'


export default[
    {
        path:'/posts',component:Posts,name:'post-index',meta:{secure:false}
    },

    {
        path:'/post/create',component:AddPost,name:'post-create' ,meta:{secure:false}
    },

    {
        path:'/post/:id/edit',component:EditPost,name:'post-edit'
    },
    {
        path:'/post/:id',component:ShowPost,name:'post-show'
    },
]
