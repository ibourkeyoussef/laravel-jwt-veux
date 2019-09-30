<template>
  <div>
    <h1>Created</h1>
        {{title}}
    <div class="row">
      <form class="col-md-8 mix-auto" @submit.prevent="store_tag">
        <div class="form-group">
          <label for="first_name">Name tag :</label>
          <input
            type="text"
            v-validate="'required|min:10'"
            name="h"
            autocomplete="off"
            v-model="tag.name"
            class="form-control"
            :class="{'is-invalid': errors.first('h')}"
          />
          <div v-if="errors.has('h')" class="invalid-feedback" >{{ errors.first('h')}}</div>
        </div>

        <input type="submit" :disabled="errors.has('h')" :class="{disabledButton:errors.has('h')}" value="Create" />
      </form>
    </div>
    <br />
    <br />
    {{$data}}

    <router-link class="btn btn-sm btn-dark" :to="{name:'tag-index'}">Back</router-link>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tag: {
        name: ""
      },
      name:'Youssef',
      p:'Ibourke'
    };
  },
  computed: {
      title(){
          console.log('computed');

          return `${this.name}       ${this.p}`;
      }
  },
  methods: {
    store_tag() {
      this.$validator.validate().then(valid => {
        if (valid) {
          axios
            .post(`http://localhost:8000/api/tag`, this.tag)
            .then(res => {
              this.$router.back();
              console.log("dd");
            })
            .catch(errors => {
              console.log(errors);
              console.log("aaa");
            });
        }
      });
    }
  }
};
</script>

<style scoped>
</style>
