<template>
    <header class="w-full bg-opacity-50 bg-white shadow z-50">
        <div class="container mx-auto">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <Logo />
                </div>
                <div class="flex items-center">
                    <Mainmenu />
                    <Profile v-if="isLoggedIn" />
                </div>
            </div>
        </div>
    </header>
</template>
  
<script>
    import Mainmenu from '../Header/Mainmenu.vue'
    import Logo from '../Header/Logo.vue'
    import Profile from '../Header/Profile.vue'
    export default {
        components: {
            'Logo': Logo,
            'Mainmenu': Mainmenu,
            'Profile': Profile
        },
        computed: {
            isLoggedIn(){
                return this.$store.getters['auth/isLoggedIn'];
            }
        }
    }
</script>