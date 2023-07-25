<template>
    <aside class="bg-orange-500 py-10 pl-6 dashboard-sidebar">
        <h1 class="text-2xl font-bold text-white">Dashboard</h1>
        <p class="text-white mt-2">Hi, Saroar Hossain</p>
        <ul class="mt-6">
            <li><router-link to="/dashboard" class="sidebar-items">Dashboard</router-link></li>

            <template v-if="userRole === 'employee'">
                <li><router-link to="/my-applications" class="sidebar-items">My Applications</router-link></li>
            </template>

            <template v-if="userRole === 'employer'">
                <li><router-link to="/all-jobs" class="sidebar-items">All Jobs</router-link></li>
                <li><router-link to="/post-job" class="sidebar-items">Post Job</router-link></li>
            </template>
            <hr class="my-2">


            <template v-if="userRole === 'admin'">
            <li><router-link to="/app-jobs" class="sidebar-items">All Jobs</router-link></li>
            <li><router-link to="/applications" class="sidebar-items">Applications</router-link></li>
            <li><router-link to="/users" class="sidebar-items">Users</router-link></li>
            <hr class="my-2">
            </template>

            <li><router-link to="/my-account" class="sidebar-items">My Account</router-link></li>
            <li><router-link to="/logout" class="sidebar-items">Logout</router-link></li>
        </ul>
    </aside>
</template>
  
<script>

    export default {
        computed: {
            userRole(){
                return this.$store.getters['auth/userRole'];
            },
            isLoggedIn(){
                return this.$store.getters['auth/isLoggedIn'];
            }
        },
    }
</script>