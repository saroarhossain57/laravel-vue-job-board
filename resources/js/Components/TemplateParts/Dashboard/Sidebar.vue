<template>
    <aside class="bg-orange-500 py-10 pl-6 dashboard-sidebar">
        <h1 class="text-2xl font-bold text-white">Dashboard</h1>
        <p class="text-white mt-2">Hi, Saroar Hossain</p>
        <ul class="mt-6">
            <li><router-link to="/dashboard" class="sidebar-items">Dashboard</router-link></li>
            <li><router-link to="/applied-jobs" class="sidebar-items">Applied Jobs</router-link></li>
            <li><router-link to="/posted-jobs" class="sidebar-items">Posted Jobs</router-link></li>
            <li><router-link to="/post-new-job" class="sidebar-items">Post New Job</router-link></li>
            <hr class="my-2">
            <li><router-link to="/app-jobs" class="sidebar-items">All Jobs</router-link></li>
            <li><router-link to="/applications" class="sidebar-items">Applications</router-link></li>
            <li><router-link to="/users" class="sidebar-items">Users</router-link></li>
            <hr class="my-2">
            <li><router-link to="/account" class="sidebar-items">Account</router-link></li>
            <li><router-link to="/logout" class="sidebar-items">Logout</router-link></li>
        </ul>
    </aside>
</template>
  
<script>

    export default {
        
    }
</script>