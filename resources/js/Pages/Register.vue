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
                    >
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email"
                        type="email"
                        placeholder="Enter your email"
                    >
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="Number">Phone Number</label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="number"
                        type="text"
                        placeholder="Enter phone number"
                    >
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password"
                        type="password"
                        placeholder="Enter password"
                    >
                </div>
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded-md" type="button">Login</button>
            </form>
        </div>
    </Main>
</template>

<script>
import Main from '../Layouts/Main.vue';
export default {
    components: {
        Main
    }
}
</script>

<style>

</style>