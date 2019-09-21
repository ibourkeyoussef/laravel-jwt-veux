<template>
    <div>
<h1>Users</h1>
<div class="row">
    <div class="col-md-4 mx-auto mb-3">
    <router-link class="btn btn-info btn-sm py-2 px-4" :to="{name:'store'}">Add</router-link>

    </div>
</div>
<div class="row">
<div class="col-md-8 mx-auto">
  <table class="table">
      <thead>
          <tr>
              <th>#</th>
              <th>name</th>
              <th>email</th>
              <th>date</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          <tr v-for="(user,index) in users" :key="index">
              <td scope="row">{{index+1}}</td>
              <td>{{user.name}}</td>
              <td>{{user.email}}</td>
              <td>{{user.date}}</td>
              <td>
                  <router-link class="btn btn-warning btn-sm" :to="{name:'edit',params:{id:user.id}}">Update</router-link>
                  <button @click.prevent="del(user.id)" class="btn btn-danger btn-sm">Del</button>
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
        users:[]
    }
},
methods: {
    load_users(){
        axios.get('http://localhost:8000/api/user')
    .then(({data}) =>{
        this.users=data.data;

    })
    },
    del(user){
        if (confirm()) {

            axios.delete(`http://localhost:8000/api/user/${user}`)
            .then(res =>{
               console.log('del');
               this.load_users()

            })
            .catch(errors=>{
                console.log(errors);

            })
        }
    }

},
mounted() {
    this.load_users();
},
    }
</script>

<style lang="scss" scoped>

</style>
