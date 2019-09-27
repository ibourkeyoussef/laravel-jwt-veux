<template>
  <div>
    <h1>Created</h1>

    <div class="row">
      <form class="col-md-8 mix-auto" @submit.prevent="store_tag">
        <div class="form-group">
          <label for="first_name">Name tag :</label>
          <input
            type="text"
            v-validate="'required|min:10'"
            name="name"
            autocomplete="off"
            v-model="tag.name"
            class="form-control"
            :class="{'is-invalid': errors.first('name')}"
          />
          <div v-if="errors.has('name')" class="invalid-feedback" >{{ errors.first('name')}}</div>
        </div>

        <input type="submit" value="Create" />
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
      }
    };
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
