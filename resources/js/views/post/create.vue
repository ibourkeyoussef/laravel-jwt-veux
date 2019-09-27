<template>
  <div>
    <h1>create Post</h1>

    <div class="row">
      <form class="col-md-8 mix-auto" @submit.prevent="store_post">
        <div class="form-group">
          <label for="first_name">title :</label>
          <input
            type="text"
            name="name"
            v-validate="'required|min:3'"
            autofocus
            autocomplete="off"
            v-model="post.title"
            class="form-control"
            :class="{ 'is-invalid':errors.has('name') }"
          />

          <div v-if="errors.has('name')" class="invalid-feedback">{{ errors.first('name') }}</div>
        </div>
        <div class="form-group">
          <label for="last_name">Body :</label>
          <input
            type="text"
            v-validate="'required'"
            autocomplete="off"
            name="body"
            v-model="post.body"
            class="form-control"
          />
          <p if="errors.has('body')">{{errors.first('body')}}</p>
        </div>
        <div class="form-group">
          <label for="last_name">Image :</label>
          <input type="file" @change="upImage($event)" v-validate="'image'" name="image" class="form-control" id="last_name" :class="{ 'is-invalid':errors.has('image') }" />
         <div v-if="errors.has('image')" class="invalid-feedback">{{ errors.first('image') }}</div>
        </div>

        <input type="submit" value="Create" />
      </form>
      {{$data}}
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: {
        title: "",
        body: "",
        image: "",
        user_id: 2
      }
    };
  },
  methods: {
    upImage(event) {
      console.log(event.target.files[0]);
      this.post.image = event.target.files[0];
    },
    store_post() {
      this.$validator.validate().then(valid => {
        if (valid) {

          let formdata = new FormData();
          Object.keys(this.post).forEach(key =>
            formdata.append(key, this.post[key])
          );


          axios
            .post(`http://localhost:8000/api/post`, formdata)
            .then(response => {
              console.log("test");

              this.$router.back();
            })
            .catch(errors => {
              console.log("Error");

              console.log(errors.response);
            });
        }
      });
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
