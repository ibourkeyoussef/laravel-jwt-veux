<template>
    <div>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
                <router-link class="nav-link" href="#" :to="{name:'home'}" >Home </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" href="#" :to="{name:'users'}" >Users </router-link>

            </li>

            <li class="nav-item">
                <router-link class="nav-link"  :to="{name:'post-index'}" >Posts </router-link>

            </li>

            <li class="nav-item">
                <router-link class="nav-link"  :to="{name:'tag-index'}" >Tags </router-link>

            </li>

            <li class="nav-item">
                <router-link class="nav-link"  :to="{name:'login'}" >Login </router-link>
            </li>

        </ul>

    </div>
</nav>
    </div>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>

</style>
