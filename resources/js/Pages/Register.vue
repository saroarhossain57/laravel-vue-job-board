<template>
    <Main>
        <div class="w-full max-w-md mx-auto mt-16 mb-16">
            <h1 class="text-center text-3xl font-bold text-gray-700">Register Your Account</h1>
            <p class="text-center text-gray-500 mb-8">Please enter all the details and register your account</p>
            <p class="text-center text-red-600 mb-2 text-xl" v-if="formError">Form not submitted. Fix the below errors.</p>
            <p class="text-center text-green-500 mb-2 text-xl" v-if="formSuccess">{{ formSuccess }}</p>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="name">Name</label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name"
                        type="text"
                        placeholder="Enter full name"
                        v-model="name"
                    >
                    <div class="text-red-500" v-if="errors.name">{{ errors.name[0] }}</div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email"
                        type="email"
                        placeholder="Enter your email"
                        v-model="email"
                    >
                    <div class="text-red-500" v-if="errors.email">{{ errors.email[0] }}</div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Account Type</label>
                    <div class="flex items-center ">
                        <input checked id="employee" type="radio" value="employee" v-model="role">
                        <label for="employee" class="w-full py-2 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Employee</label>
                    </div>
                    <div class="flex items-center">
                        <input id="employer" type="radio" value="employer" v-model="role">
                        <label for="employer" class="w-full py-2 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Employer</label>
                    </div>
                    <div class="text-red-500" v-if="errors.role">{{ errors.role[0] }}</div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="Number">Phone Number</label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="number"
                        type="text"
                        placeholder="Enter phone number"
                        v-model="phone"
                    >
                    <div class="text-red-500" v-if="errors.phone">{{ errors.phone[0] }}</div>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password"
                        type="password"
                        placeholder="Enter password"
                        v-model="password"
                    >
                    <div class="text-red-500" v-if="errors.password">{{ errors.password[0] }}</div>
                </div>
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded-md" type="button" @click.prevent="formSubmitHandler" :disabled="formSubmitting">Register</button> <span v-show="formSubmitting">Registering account...</span>
            </form>
        </div>
    </Main>
</template>

<script>
import Main from '../Layouts/Main.vue';
import axios from 'axios';

export default {
    components: {
        Main
    },
    data() {
        return {
            name: '',
            email: '',
            role: 'employee',
            phone: '',
            password: '',
            formSubmitting: false,
            formError: false,
            errors: {
                name: '',
                email: '',
                role: '',
                password: '',
                phone: ''
            },
            formSuccess: false
        }
    },
    methods: {
        
        formSubmitHandler() {
            console.log(this.role);
            this.formSubmitting = true
            axios.post('/api/register', {
                name: this.name,
                email: this.email,
                role: this.role,
                phone: this.phone,
                password: this.password
            }).then(response => {
                
                if(response.data.success) {
                    this.name = '';
                    this.email = '';
                    this.phone = '';
                    this.role = 'employee';
                    this.password = '';
                    this.errors = {
                        name: '',
                        email: '',
                        role: '',
                        password: '',
                        phone: ''
                    }
                    this.formError = false;
                    this.formSuccess = response.data.message;

                    // store token in local storage
                    localStorage.setItem('token', response.data.data.access_token);

                    // route redirect to dashboard
                    this.$router.push('/dashboard')
                }

            }).catch(error => {

   
                if(error.response && error.response.data.success === false) {
                    this.errors = error.response.data.data;
                    this.formError = true
                }
            

            }).finally( () => {
                this.formSubmitting = false
            })
        }
    }
}
</script>

<style>

</style>