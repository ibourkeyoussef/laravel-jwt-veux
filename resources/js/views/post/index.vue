<template>
  <div>
    <div class="row">
      <div class="col-md-4 my-2" v-for="post in posts" :key="post.id">
        <div class="card">
          <router-link :to="{name:'post-show',params:{id:post.id}}">
            <img
              class="card-img-top"
              :src="`http://localhost:8000/storage/${post.image}`"
              height="200"
              alt
            />
            </router-link>
            <div class="card-body">
              <h4 class="card-title">{{post.title}}</h4>
              <p class="card-text">{{post.body}}</p>
              <hr />
              <p class="card-text">{{post.username}}</p>
            </div>
            <div class="card-footer">
              <div class="text-center">
              <router-link
                class="btn btn-sm btn-warning"
                :to="{name:'post-edit',params:{id:post.id}}"
              >
                <i class="fas fa-edit"></i>
              </router-link>

               <button class="btn btn-sm btn-danger ml-3"><i class="fas fa-trash    "></i></button>
              </div>
            </div>

        </div>
      </div>

      <infinite-loading spinner="bubbles" @infinite="infiniteHandler">
        <span slot="no-more">
          <div class="alert alert-warning" role="alert">
            <b>No Data</b>!
          </div>
        </span>
      </infinite-loading>
    </div>
  </div>
</template>

<script>
import message from "./message.vue";
import { mapGetters } from "vuex";
import InfiniteLoading from "vue-infinite-loading";
export default {
  components: {
    InfiniteLoading,
    "app-message": message
  },
  props: ["msg"],

  data() {
    return {
      posts: [],
      page: 1
    };
  },

  created() {
    //   this.$store.dispatch('infiniteHandler')
    this.infiniteHandler();
  },
  computed: {
    // ...mapGetters(['posts'])
  },
  methods: {
    infiniteHandler($state) {
      //  this.$store.dispatch('infiniteHandler')
      axios
        .get("http://localhost:8000/api/post", {
          params: {
            page: this.page
          }
        })
        .then(({ data }) => {
          if (data.data.length) {
            this.page += 1;
            this.posts.push(...data.data);

            setTimeout(() => {
              $state.loaded();
            }, 1400);
          } else {
            $state.complete();
          }
        })
        .catch(erro => console.log(erro));
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
