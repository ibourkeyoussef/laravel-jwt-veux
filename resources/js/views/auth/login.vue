<template>

    <div class="row justify-content-center mt-4" >
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Login</div>

          <div class="card-body">
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <input
                      id="email"
                      type="email"
                      v-model="user.email"
                      class="form-control"
                      autofocus
                      required
                      autocomplete="email"
                    />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="fa fa-user-circle"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right"><ot de pass</label>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <input
                      id="password"
                      type="password"
                      :type="show ? 'text' :'password'"
                      v-model="user.password"
                      class="form-control"
                      autofocus
                      required
                      autocomplete
                    />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i
                          class="fa fa-eye v-h"
                          v-show="!show"
                          @click="show =!show"
                          aria-hidden="true"
                        ></i>
                        <i
                          class="fa fa-eye-slash v-h"
                          v-show="show"
                          @click="show =!show"
                          aria-hidden="true"
                        ></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <div class="form-group row">
                  <div class=" mx-auto">

            <div class="form-group">
              <button type="submit" @click.prevent="logins" class="btn btn-primary">
                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Login
              </button>
              <p class="text-danger">{{erro}}</p>
            </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { login } from "../../Helpers/auth";
export default {
  data() {
    return {
      //   myUrl: "http://localhost:8000/api/auth",
      user: {
        email: "",
        password: ""
      },
      show: "",
      erro: "",
      isLoading: false
    };
  },
  methods: {
    logins() {
      this.$store
        .dispatch("performLoginAction", this.user)
        .then(res => {
          this.isLoading = false;
          window.location = "/posts";
          // this.$router.push({name: 'post-index'});
        })
        .catch(errors => {
          this.erro = "incurect password or email";
        });
      //            User.login(this.user)
      //                 .then((res) => {
      //                     this.$store.commit("loginSuccess", res);
      //                     this.$router.push({path: '/post'});
      //                     console.log('posts');

      //                 })
      //                 .catch((error) => {
      //                     this.$store.commit("loginFailed", {error});
      //                 });
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
