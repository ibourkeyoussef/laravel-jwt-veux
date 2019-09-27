<template>

       <div class="row">
           <div class="col-md-6 mx-auto">

     <div class="card" >
       <img class="card-img-top" src="https://source.unsplash.com/random" alt="">
       <div class="card-body">
         <h4 class="card-title" v-text="post.title"></h4>
         <p class="card-text" v-text="post.body" ></p>
       </div>
       <div class="card-footer">
           {{post.username}}
       </div>
       </div>

       </div >
     </div>


</template>

<script>
    export default {
        data() {
            return {
                post:{
                    title:'',
                    body:'',
                    image:'',
                    username:'',
                }
            }
        },
mounted() {

     axios.get(`http://localhost:8000/api/post/${this.$route.params.id}`)
     .then(({data})=>{
         console.log(data);
         this.post=data.data

     }
     )
},
    }
</script>

<style lang="scss" scoped>

</style>
