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
      <tbody >
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


           <infinite-loading spinner="bubbles"  @infinite="infiniteHandler">
        	<span slot="no-more">
        		No data
        	</span>
        </infinite-loading>

      </tbody>
  </table>


</div>

</div>
    </div>
</template>

<script>
import InfiniteLoading from 'vue-infinite-loading';
    export default {
         components: {
    InfiniteLoading,
  },
data() {

    return {
        users:[],
        page:1
    //      limit: 10,
    // busy: false
    }
},
mounted() {
    this.infiniteHandler();
},
methods: {
       infiniteHandler($state) {
      axios.get('http://localhost:8000/api/user', {
        params: {
          page: this.page,
        },
      }).then(({ data }) => {
        if (data.data.length) {
          this.page += 1;
          this.users.push(...data.data);
          setTimeout(() => {
						$state.loaded();
					}, 1000);
        } else {
          $state.complete();
        }
      });
    },

    del(user){
        if (confirm()) {

            axios.delete(`http://localhost:8000/api/user/${user}`)
            .then(res =>{
               console.log('del');
               this.infiniteHandler()

            })
            .catch(errors=>{
                console.log(errors);

            })
        }
    }

},

    }
</script>

<style lang="scss" scoped>

</style>
