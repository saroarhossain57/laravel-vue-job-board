<template>
    <Main>
        <div class="w-full max-w-md mx-auto mt-16 mb-16">
            <h1 class="text-center text-3xl font-bold text-gray-700">Login</h1>
            <p class="text-center text-gray-500 mb-8">Please enter your email and password</p>

            <p class="text-center text-red-600 mb-2 text-xl" v-if="formError">{{ formError }}</p>
            <p class="text-center text-green-500 mb-2 text-xl" v-if="formSuccess">{{ formSuccess }}</p>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email"
                        type="email"
                        placeholder="Email"
                        v-model="email"
                    >
                    <div class="text-red-500" v-if="errors.email">{{ errors.email[0] }}</div>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password"
                        type="password"
                        placeholder="Password"
                        v-model="password"
                    >
                    <div class="text-red-500" v-if="errors.password">{{ errors.password[0] }}</div>
                </div>
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded-md" type="button" @click.prevent="formSubmitHandler">Login</button> <span v-show="formSubmitting">Login account...</span>
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
            email: '',
            password: '',
            formError: false,
            formSubmitting: false,
            errors: {
                email: '',
                password: ''
            },
            formSuccess: false
        }
    },
    methods: {
        formSubmitHandler() {
            this.formSubmitting = true;
            axios.post('/api/login', {
                email: this.email,
                password: this.password
            }).then(response => {
                
                if(response.data.success) {
                    this.email = '';
                    this.password = '';
                    this.errors = {
                        email: '',
                        password: '',
                    }
                    this.formError = false;
                    this.formSuccess = response.data.message;

                    // route redirect to dashboard
                    this.$router.push('/dashboard')
                }

            }).catch(error => {

   
                if(error.response && error.response.data.success === false) {
                    this.errors = error.response.data.data;
                    this.formError = error.response.data.message
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