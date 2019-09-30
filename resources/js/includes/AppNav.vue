<template>
    <div>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
                <router-link class="nav-link" href="#" :to="{name:'home'}" >Home </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" href="#" v-if="loggedIn" :to="{name:'users'}" >Users </router-link>

            </li>

            <li class="nav-item">
                <router-link class="nav-link"  :to="{name:'post-index'}" >Posts </router-link>

            </li>

            <li class="nav-item">
                <router-link class="nav-link"  :to="{name:'tag-index'}" >Tags </router-link>

            </li>




        </ul>
        <ul class="navbar-nav ">
             <li class="nav-item">
                <router-link class="nav-link"  v-if="!loggedIn" :to="{name:'login'}" >Login </router-link>
                 <a  v-else @click.prevent="signOut" href="#" class="nav-link" >Logout</a>
            </li>
        </ul>


    </div>
</nav>
    </div>
</template>

<script>
    export default {

 data() {
     return {

    //    logged: User.loggedIn(),
    //    myUrl: "http://localhost:8000/api/auth/logout"
     }
   },
   computed: {
       loggedIn() {
      return this.$store.getters.get_loggedIn;
    }
   },
   methods: {
     signOut() {
      this.$store.dispatch('performLogoutAction')
      .then(res=>{

            this.$router.push({name: 'login'});

        })
        .catch(errors =>{
            console.log(errors);

        })
     }

   }
    }
</script>

<style lang="sc
