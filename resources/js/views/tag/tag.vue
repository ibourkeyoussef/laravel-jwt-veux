<template>
    <div>
   <h1>Tag</h1>
    <router-link class="btn btn-sm btn-primary" :to="{name:'add-tag'}">Add</router-link>
   <div class="row">
       <div class="col-md-8 mx-auto">
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>name</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 <tr v-for="(tag, index) in tags" :key="index">

                     <td>{{index+=1}}</td>
                     <td>{{tag.name}}</td>
                     <td>
                         <router-link class="btn btn-sm btn-warning" :to="{name:'tag-edit',params:{id:tag.id}}">Edit</router-link>
                         <button @click.prevent="del(tag.id)" class="btn btn-sm btn-danger">Delete</button>
                     </td>
                 </tr>
             </tbody>
         </table>

       </div>
   </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                tags:[]
            }
        },
         methods: {
             load_tag(){
                 axios.get('http://localhost:8000/api/tag')
                 .then(({data}) => {
                     this.tags = data.data

                 })
             },
             del(tag){
                 axios.delete(`http://localhost:8000/api/tag/${tag}`)
                 .then(res=>{
                     console.log(res);

                 })
             }
         },
         mounted() {
             this.load_tag();
         },
    }
</script>

<style scoped>

</style>
