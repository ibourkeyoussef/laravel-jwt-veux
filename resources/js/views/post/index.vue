<template>
    <div>
<router-link class="btn btn-sm " :to="{name:'post-create'}"> Create Post</router-link>
<div class="row">
    <div class="col-md-4" v-for="post in posts" :key="post.id">
        <div class="card" >

            <img class="card-img-top" :src="'http://localhost:8000/storage/'+ post.image"  height="130" alt="">
            <div class="card-body">
                <h4 class="card-title">{{post.title}}</h4>
                <p class="card-text">{{post.body}}</p>
                <hr>
                <p class="card-text">{{post.username}}</p>
            </div>
            <div class="card-footer">
                <div class="text-right">

                <router-link :to="{name:'post-edit',params:{id:post.id}}" class="btn btn-sm btn-warning">Upadte</router-link>
                </div>
            </div>

        </div>
    </div>
</div>
    </div>
</template>

<script>
    export default {
data() {
    return {
        posts:[]
    }
},
methods: {
    load_post(){
    axios.get('http://localhost:8000/api/post')
    .then(({data}) =>{
        console.log(data.data);
        this.posts=data.data

    })
    // console.log('lll');

    }
},
created() {
    this.load_post();
},
    }
</script>

<style lang="scss" scoped>

</style>
