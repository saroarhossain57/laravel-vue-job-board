<template>
    <Dashboard>
      <h1 class="text-3xl">Edit Job Post: </h1>
      <div class="h-1 bg-slate-800 mt-3 mb-7"></div>

      <!-- back to previous page button -->
      <router-link to="/all-jobs" class="inline-block bg-blue-500 text-white px-10 py-2 rounded-md mb-7"> - Back to jobs</router-link>

      <p v-if="loading">Loading...</p>
      <template v-else>
        <p class="text-red-600 border-l-4 border-red-500 pl-2 py-1 mb-3" v-if="formError">Opps! There is some issue. Please check below.</p>
        <p class="text-green-600 border-l-4 border-green-500 pl-2 py-1 mb-3" v-if="formSuccess">Wow! Upated the job successfully.</p>
        <div class="jb-form">
          <form @submit.prevent="submit" class="p-8 bg-slate-100">
            <div class="jb-field mb-4">
              <label class="jb-label text-lg block mb-2" for="title">Title</label>
              <input type="text" id="title" v-model="single_job.title" class="jb-input w-full h-10 rounded-md p-3" placeholder="Job Post Title">
              <div class="text-red-500" v-if="errors.title">{{ errors.title[0] }}</div>
            </div>
            <div class="jb-field mb-4">
              <label class="jb-label text-lg block mb-2" for="description">Description</label>
              <textarea class="w-full rounded-md h-text-area p-3" id="description" v-model="single_job.description" placeholder="Job Description"></textarea>
              <div class="text-red-500" v-if="errors.description">{{ errors.description[0] }}</div>
            </div>
            <div class="jb-field mb-4">
              <label class="jb-label text-lg block mb-2" for="company">Company</label>
              <input type="text" id="company" v-model="single_job.company" class="jb-input w-full h-10 rounded-md p-3" placeholder="Company Name">
              <div class="text-red-500" v-if="errors.company">{{ errors.company[0] }}</div>
            </div>
            <div class="jb-field mb-4">
              <label class="jb-label text-lg block mb-2" for="category">Category</label>
              <select id="category" v-model="single_job.category" class="jb-input w-full h-10 rounded-md p-3">
                <option value="">Select Category</option>
                <option value="Software Engineer">Software Engineer</option>
                <option value="Business Analyst">Business Analyst</option>
                <option value="Data Scientist">Data Scientist</option>
                <option value="Full Stack Developer">Full Stack Developer</option>
                <option value="UI/UX Designer">UI/UX Designer</option>
              </select>
              <div class="text-red-500" v-if="errors.category">{{ errors.category[0] }}</div>
            </div>
            <div class="jb-field mb-4">
              <label class="jb-label text-lg block mb-2" for="location">Location</label>
              <input type="text" id="location" v-model="single_job.location" class="jb-input w-full h-10 rounded-md p-3" placeholder="Office Location">
              <div class="text-red-500" v-if="errors.location">{{ errors.location[0] }}</div>
            </div>
            <div class="jb-field mb-4">
              <label class="jb-label text-lg block mb-2" for="salary_range">Salary Range</label>
              <input type="text" id="salary_range" v-model="single_job.salary_range" class="jb-input w-full h-10 rounded-md p-3" placeholder="Salary Range">
              <div class="text-red-500" v-if="errors.salary_range">{{ errors.salary_range[0] }}</div>
            </div>
            <div class="jb-field mb-4">
              <label class="jb-label text-lg block mb-2" for="job_type">Job Type</label>
              <select id="job_type" v-model="single_job.job_type" class="jb-input w-full h-10 rounded-md p-3">
                <option value="Full Time" selected="selected">Full Time</option>
                <option value="Part Time">Part Time</option>
              </select>
              <div class="text-red-500" v-if="errors.job_type">{{ errors.job_type[0] }}</div>
            </div>
            <div class="jb-field mb-4">
              <label class="jb-label text-lg block mb-2" for="skills">Skills</label>
              <input type="text" id="skills" v-model="single_job.skills" class="jb-input w-full h-10 rounded-md p-3" placeholder="Your Skills: HTML, CSS, JavaScript">
              <div class="text-red-500" v-if="errors.skills">{{ errors.skills[0] }}</div>
            </div>
            <div class="jb-field mb-4">
              <button type="submit" class="jb-btn rounded-md py-3 px-10 text-white bg-blue-500" :disabled="formSubmitting">Update</button> <span class="ml-4 text-indigo-500" v-if="formSubmitting">Posting the job...</span>
            </div>
          </form>
        </div>
      </template>
    </Dashboard>
  </template>
  
  <script>
  import { mapState } from 'vuex';
  import Dashboard from '../../Layouts/Dashboard.vue';
  export default {
    components: {
      Dashboard,
    },
    data() {

      return {
        dataLoading: true,
        formSubmitting: false,
        formError: false,
        errors: {
            title: '',
            description: '',
            company: '',
            category: '',
            location: '',
            salary_range: '',
            job_type: '',
            skills: ''
        },
        formSuccess: false
      }
    },

    methods: {
      submit() {
        this.formSubmitting = true;
        axios.put('/api/jobs/' + this.$route.params.id, this.single_job).then(response => {

          this.formError = false;
          this.formSuccess = true;

          this.errors = {
            title: '',
            description: '',
            company: '',
            category: '',
            location: '',
            salary_range: '',
            job_type: '',
            skills: ''
          }

          this.$store.dispatch('jobs/editJob', response.data.data);
        }).catch(error => {

          if(error.response && error.response.data.success === false) {
            this.errors = error.response.data.data;
            this.formError = true;
            this.formSuccess = false;
          }

        }).finally(() => {

          this.formSubmitting = false;

          setTimeout(() => {
            // redirect to all jobs
            this.$router.push('/all-jobs');
          }, 3000);

        })
      }
    },
    async mounted() {
      await this.$store.dispatch('jobs/fetchJobById', this.$route.params.id);
    },
    computed: {
      ...mapState('jobs', ['single_job', 'loading'])
    }
  }
  </script>

