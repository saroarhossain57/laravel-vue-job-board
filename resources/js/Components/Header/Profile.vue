<template>
    <div class="ml-8 relative" ref="menu">
        <div>
            <button class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-solid" @click="toggleMenuShow">
                <img class="h-8 w-8 rounded-full" :src="profilePicture" alt="Profile picture">
            </button>
        </div>
        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg z-50" v-show="showMenu">
            <div class="py-1 bg-white rounded-md shadow-xs">

                <router-link to="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="toggleMenuShow">Dashboard</router-link>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click="logoutHnadler">Logout</a>
            </div>
        </div>
    </div>
</template>

<script>
import profile from "@/assets/images/profile.jpg";
export default {
    
    data() {
        return {
            showMenu: false,
            profilePicture: profile,
        }
    },
    methods: {
        toggleMenuShow() {
            this.showMenu = !this.showMenu;
        },
        handleDocumentClick(event) {
            const menu = this.$refs.menu
            if (!menu.contains(event.target)) {
                this.showMenu = false
            }
        },
        logoutHnadler() {
            this.$store.dispatch('auth/logout');
        }
    },
    created() {
        document.addEventListener('click', this.handleDocumentClick)
    },
    beforeUnmount() {
        document.removeEventListener('click', this.handleDocumentClick)
    }
}
</script>
