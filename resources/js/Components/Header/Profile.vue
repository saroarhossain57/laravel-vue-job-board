<template>
    <div class="ml-8 relative">
        <div>
            <button class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-solid" @click="toggleAccountMenu" @blur="toggleAccountMenu">
                <img class="h-8 w-8 rounded-full" :src="profilePicture" alt="Profile picture">
            </button>
        </div>
        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg z-50" v-show="isAccountMenuActive">
            <div class="py-1 bg-white rounded-md shadow-xs">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
        </div>
    </div>
</template>

<script>
import profile from "@/assets/images/profile.jpg";
export default {
    
    data() {
        return {
            isAccountMenuActive: false,
            profilePicture: profile,
        }
    },
    methods: {
        toggleAccountMenu() {
            this.isAccountMenuActive = !this.isAccountMenuActive
        }
    }
}
</script>
