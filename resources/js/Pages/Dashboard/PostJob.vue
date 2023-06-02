<template>
    <Dashboard>
      <h1 class="text-3xl">Create A Job</h1>
      <div class="h-1 bg-slate-800 mt-3 mb-7"></div>
      <p class="text-red-600 border-l-4 border-red-500 pl-2 py-1 mb-3" v-if="formError">Opps! There is some issue. Please check below.</p>
      <p class="text-green-600 border-l-4 border-green-500 pl-2 py-1 mb-3" v-if="formSuccess">Wow! You have successfully created a job.</p>
      <div class="jb-form">
        <form @submit.prevent="submit" class="p-8 bg-slate-100">
          <div class="jb-field mb-4">
            <label class="jb-label text-lg block mb-2" for="title">Title</label>
            <input type="text" id="title" v-model="title" class="jb-input w-full h-10 rounded-md p-3" placeholder="Job Post Title">
            <div class="text-red-500" v-if="errors.title">{{ errors.title[0] }}</div>
          </div>
          <div class="jb-field mb-4">
            <label class="jb-label text-lg block mb-2" for="description">Description</label>
            <textarea class="w-full rounded-md h-text-area p-3" id="description" v-model="description" placeholder="Job Description"></textarea>
            <div class="text-red-500" v-if="errors.description">{{ errors.description[0] }}</div>
          </div>
          <div class="jb-field mb-4">
            <label class="jb-label text-lg block mb-2" for="company">Company</label>
            <input type="text" id="company" v-model="company" class="jb-input w-full h-10 rounded-md p-3" placeholder="Company Name">
            <div class="text-red-500" v-if="errors.company">{{ errors.company[0] }}</div>
          </div>
          <div class="jb-field mb-4">
            <label class="jb-label text-lg block mb-2" for="category">Category</label>
            <select id="category" v-model="category" class="jb-input w-full h-10 rounded-md p-3">
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
            <input type="text" id="location" v-model="location" class="jb-input w-full h-10 rounded-md p-3" placeholder="Office Location">
            <div class="text-red-500" v-if="errors.location">{{ errors.location[0] }}</div>
          </div>
          <div class="jb-field mb-4">
            <label class="jb-label text-lg block mb-2" for="salary_range">Salary Range</label>
            <input type="text" id="salary_range" v-model="salary_range" class="jb-input w-full h-10 rounded-md p-3" placeholder="Salary Range">
            <div class="text-red-500" v-if="errors.salary_range">{{ errors.salary_range[0] }}</div>
          </div>
          <div class="jb-field mb-4">
            <label class="jb-label text-lg block mb-2" for="job_type">Job Type</label>
            <select id="job_type" v-model="job_type" class="jb-input w-full h-10 rounded-md p-3">
              <option value="Full Time" selected="selected">Full Time</option>
              <option value="Part Time">Part Time</option>
            </select>
            <div class="text-red-500" v-if="errors.job_type">{{ errors.job_type[0] }}</div>
          </div>
          <div class="jb-field mb-4">
            <label class="jb-label text-lg block mb-2" for="skills">Skills</label>
            <input type="text" id="skills" v-model="skills" class="jb-input w-full h-10 rounded-md p-3" placeholder="Your Skills: HTML, CSS, JavaScript">
            <div class="text-red-500" v-if="errors.skills">{{ errors.skills[0] }}</div>
          </div>
          <div class="jb-field mb-4">
            <button type="submit" class="jb-btn rounded-md py-3 px-10 text-white bg-blue-500" :disabled="formSubmitting">Submit</button> <span class="ml-4 text-indigo-500" v-if="formSubmitting">Posting the job...</span>
          </div>
        </form>
      </div>
    </Dashboard>
  </template>
  
  <script>
  import Dashboard from '../../Layouts/Dashboard.vue';
  export default {
    components: {
      Dashboard,
    },
    data() {
      return {
        title: '',
        description: '',
        company: '',
        category: '',
        location: '',
        salary_range: '',
        job_type: 'Full Time',
        skills: '',
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
        axios.post('/api/jobs', {

          title: this.title,
          description: this.description,
          company: this.company,
          category: this.category,
          location: this.location,
          salary_range: this.salary_range,
          job_type: this.job_type,
          skills: this.skills
          
        }).then(response => {

          this.formError = false;
          this.formSuccess = true;

          this.title = '';
          this.description = '';
          this.category = '';
          this.company = '';
          this.location = '';
          this.salary_range = '';
          this.job_type = 'Full Time';
          this.skills = '';

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

          this.$store.dispatch('jobs/addNewJob', response.data.data);
        }).catch(error => {

          if(error.response && error.response.data.success === false) {
            this.errors = error.response.data.data;
            this.formError = true;
            this.formSuccess = false;
          }

        }).finally(() => {

          this.formSubmitting = false;

        })
      }
    }
  }
  </script>

