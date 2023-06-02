<template>
    <Dashboard>
      <h1 class="text-3xl">All Created Jobs</h1>
      <div class="h-1 bg-slate-800 mt-3 mb-7"></div>

      <div class="jb-data-table">
        <div v-if="loading">Loading Data...</div>
        <template v-else>
          <table v-if="data" class="table w-full">
            <thead>
              <tr class="text-left uppercase font-bold bg-slate-200 text-gray-600 p-5">
                <th>Title</th>
                <th>Category</th>
                <th>Job Type</th>
                <th>Location</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="job in data" :key="job.id">
                <td>{{ job.title }}</td>
                <td>{{ job.category }}</td>
                <td>{{ job.job_type }}</td>
                <td>{{ job.location }}</td>
                <td>
                  <router-link to="" class="small_btn">View</router-link>
                  <router-link :to="`/edit-job/${job.id}`" class="small_btn ml-1 green_btn">Edit</router-link>
                  <a href="#" class="small_btn ml-1 red_btn">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
          <div v-else>No Jobs Created Yet</div>
        </template>
      </div>
    </Dashboard>
  </template>
  
  <script>
  import { mapState } from 'vuex';
  import Dashboard from '../../Layouts/Dashboard.vue';
  export default {
    components: {
      Dashboard,
    },
    mounted() {
      this.$store.dispatch('jobs/getAllJobs');
    },
    computed: {
      ...mapState('jobs', ['data', 'loading']),
    }

  }
  </script>