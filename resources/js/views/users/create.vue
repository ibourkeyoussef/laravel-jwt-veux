<template>
    <div>
<div class="row">
      <form class="col-md-8 mix-auto" @submit.prevent="uploadForm" >
            <div class="form-group">
                <label for="first_name">Name : </label>
                <input type="text"  name="name" v-model="user.name" class="form-control"  >

            </div>
            <div class="form-group">


     <label for="last_name">Email : </label>
                <input type="text" v-validate="'required|email'" name="email" v-model="user.email" class="form-control" id="last_name">

            </div>


                <input type="submit" value="Upload">

            </form>

</div>

    </div>
</template>

<script>
import { ValidationProvider } from 'vee-validate';
    export default {
      components: {
    ValidationProvider
  },
  data() {
      return {
          user:{
              name:'',
              email:''
          },
          email:''
      }
  },
  methods: {
      uploadForm(){

      }
  },
    }
</script>

<style lang="scss" scoped>

</style>
