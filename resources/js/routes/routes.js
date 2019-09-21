
import Home from './../views/Home.vue'


import user from './routes/user'
import tag from './routes/tag'
import post from './routes/post'
import Login from './../views/auth/login.vue'



const routes=[
    {path:'/',component:Home,name:'home'},
    ...user,
    ...tag,
    ...post,

    {path:'/login',component:Login,name:'login'},
    // {path:'/posts',component:Post,name:'post-index'},
    // {path:'/post/create',component:PostCreate,name:'post-create'},

]

export default routes;
