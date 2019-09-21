import Tag from './../../views/tag/tag.vue'
import Addtag from './../../views/tag/create.vue'
import Edittag from './../../views/tag/edit.vue'


export default [

    {path:'/tags',component:Tag,name:'tag-index'},
    {path:'/tag/:id/edit',component:Edittag,name:'tag-edit'},
    {path:'/tag/create',component:Addtag,name:'add-tag'},

]
