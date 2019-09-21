<template>
    <div>
<h1>Edit</h1>
  {{this.$route.params.id}}
  <div class="row">
      <div class="col-md-6 mx-auto">

      <div class="form-group">
        <label for="name">name</label>
        <input type="text" v-model="tag.name"  class="form-control" placeholder="" aria-describedby="helpId">

      </div>
      <button @click.prevent="update" class="btn btn-block btn-warning">Update</button>
      <router-link class="btn btn-block btn-dark mt-2" :to="{name:'tag-index'}">Back</router-link>

      </div>
  </div>
    </div>
</template>

<script>
    export default {
data() {
    return {
       tag:{
           name:''
       }
    }
},
methods: {
    update(){
        // axios.put(`http://localhost:8000/api/tag/${this.$route.params.id}`,this.tag)
         let url = `http://localhost:8000/api/tag/` + this.$route.params.id;
      axios.patch(url, this.tag)
        .then(res =>{
            console.log(res);
            this.$router.push({name:'tag-index'});
        })
        .catch(err=>{
            console.log(err);

        })
    }
},
mounted() {
      const url = `http://localhost:8000/api/tag/${this.$route.params.id}`;
    axios
      .get(url)
      .then(res => {
     console.log(res.data.data);


        this.tag = res.data.data;
      })
      .catch(() =>
        console.log("Can’t access " + url + " response. Blocked by browser?")
      );
},
    }
</script>

<style scoped>

</style>
