<template>
    <div class="form">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input v-model="user.email" class="form-control" type="email" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input v-model="user.password" class="form-control" type="password" id="password" name="password">
        </div>
        <div class="form-group">
            <button @click="login" class="btn btn-primary">Login</button>
        <square :loading="isLoading"></square>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    email:'',
                    password:''
                },
                isLoading:false,
            }
        },
        methods: {
            login() {
                this.isLoading=true;
                this.$store.dispatch('login', this.user)
                .then(res => {
                    this.isLoading=true
                })

            }
        },
        created: function () {
        }
    }
</script>
