<template>
  <div>
    <div class="row">
      <form class="col-md-8 mix-auto" @submit.prevent="Store_User">
        <div class="form-group">
          <label for="first_name">Name :</label>
          <input
            type="text"
            name="name"
            autocomplet="off"
            v-validate="'required'"
            v-model="user.name"
            class="form-control"
            :class="{'is-invalid':errors.has('name')}"
          />
          <p v-if="errors.has('name')">{{errors.first('name')}}</p>
        </div>
        <div class="form-group">
          <label for="last_name">Email :</label>
          <input
            type="email"
            v-validate="'required|email'"
            name="email"
            autocomplet="off"
            v-model="user.email"
            class="form-control"
            id="last_name"
            :class="{'is-invalid':errors.has('email')}"
          />
          <p v-if="errors.has('email')">{{errors.first('email')}}</p>
        </div>

        <div class="form-group">
          <label for="pwd">password :</label>
          <input
            type="password"
            autocomplet="off"
            v-validate="'required'"
            name="pwd"
            v-model="user.password"
            class="form-control"
            id="pwd"
            :class="{'is-invalid':errors.has('pwd')}"

          />
          <p v-if="errors.has('pwd')">{{errors.first('pwd')}}</p>
        </div>

        <input type="submit" value="Create" class="btn btn-sm btn-success" />
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        name: "",
        email: "",
        password: ""
      }
    };
  },
  methods: {
    Store_User() {
      this.$validator.validate().then(valid => {
        if (valid) {
          axios.post('http://localhost:8000/api/user',this.user)
          .then(res=>{
             this.$router.push({name:'users'})

          })
          .catch(errors=>{
              console.log(errors);

          })
        }
      });

    }
  }
};
</script>

<style lang="scss" scoped>
</style>
