<template>
    <header class="fixed top-0 left-0 w-full bg-opacity-50 bg-white shadow z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <Logo />
                </div>
                <div class="flex items-center">
                    <Mainmenu />
                    <Profile />
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
        }
    }
</script>