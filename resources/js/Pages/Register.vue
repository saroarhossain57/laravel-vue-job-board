<template>
    <Main>
        <div class="w-full max-w-md mx-auto mt-16 mb-16">
            <h1 class="text-center text-3xl font-bold text-gray-700">Register Your Account</h1>
            <p class="text-center text-gray-500 mb-8">Please enter all the details and register your account</p>
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
            phone: '',
            password: '',
            formSubmitting: false
        }
    },
    methods: {
        formSubmitHandler() {
            this.formSubmitting = true
            axios.post('/api/register', {
                name: this.name,
                email: this.email,
                phone: this.phone,
                password: this.password
            }).then(response => {
                
                if(response.data.success) {
                    
                }

            }).catch(error => {

                console.log(error)



            }).finally( () => {
                this.name = '';
                this.email = '';
                this.phone = '';
                this.password = '';
                this.formSubmitting = false
            })
        }
    }
}
</script>

<style>

</style>