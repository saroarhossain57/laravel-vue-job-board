<template>
    <div class="ml-3">

        <div class="flex">
            <router-link to="/" class="px-3 py-2 text-sm focus:text-orange-500">Jobs</router-link>
            <router-link v-if="!isLoggedIn" to="/login" class="px-3 py-2 text-sm focus:text-orange-500">Login</router-link>
            <router-link v-if="!isLoggedIn" to="/register" class="px-3 py-2 text-sm focus:text-orange-500">Register</router-link>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        isLoggedIn(){
            return this.$store.getters['auth/isLoggedIn'];
        }
    },

}
</script>
