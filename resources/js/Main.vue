<template>
  <div>

    <div class="container">
     <app-nav></app-nav>
      <transition name="fade out">
        <router-view />
      </transition>
    </div>

  </div>
</template>

<script>
import  AppNav from './includes/AppNav'
export default {
  name: "app",
  components: {
    'app-nav':AppNav
  }
};
</script>

<style lang="css" scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to

/* .fade-leave-active below version 2.1.8 */
 {
  opacity: 0;
}
</style>
