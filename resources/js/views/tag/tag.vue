<template>
  <div>
    <h1>Tag</h1>
    <router-link class="btn btn-sm btn-primary" :to="{name:'add-tag'}">Add</router-link>
    <div class="row">
      <div class="col-md-8 mx-auto">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(tag, index) in tags.data" :key="index">
              <td>{{index+=1}}</td>
              <td>{{tag.name}}</td>
              <td>
                <router-link
                  class="btn btn-sm btn-warning"
                  :to="{name:'tag-edit',params:{id:tag.id}}"
                >Edit</router-link>
                <button @click.prevent="del(tag)" class="btn btn-sm btn-danger">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="card-footer">
          <pagination :data="tags" @pagination-change-page="getResults"></pagination>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tags: {}
    };
  },
  methods: {
    getResults(page = 1) {
      axios
        .get("http://localhost:8000/api/tag?page=" + page)
        .then(({ data }) => {
          this.tags = data;
        });
    },
    load_tag() {
      axios.get("http://localhost:8000/api/tag").then(({ data }) => {
        this.tags = data;
      });
    },
    del(tag) {


        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
       axios
        .delete(`http://localhost:8000/api/tag/${tag.id}`)
        .then(() => {
          this.load_tag();
        })
        .catch(error => {
          console.error(error);
        });
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

    }
  },
  mounted() {
    this.load_tag();
  }
};
</script>

<style scoped>
</style>
