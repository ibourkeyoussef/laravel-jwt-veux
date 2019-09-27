<template>
  <div>
    <div class="row">
      <div class="col-md-6 my-2" v-for="post in posts" :key="post.id">
        <div class="card">
          <router-link :to="{name:'post-show',params:{id:post.id}}">
            <img class="card-img-top" src="https://source.unsplash.com/random" height="200" alt />
            <div class="card-body">
              <h4 class="card-title">{{post.title}}</h4>
              <p class="card-text">{{post.body}}</p>
              <hr />
              <p class="card-text">{{post.username}}</p>
            </div>
          </router-link>
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
import { mapGetters } from "vuex";
import InfiniteLoading from "vue-infinite-loading";
export default {
  components: {
    InfiniteLoading
  },
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
