<template>
    <router-link to="/" class="flex items-center">
        <img class="h-8 w-auto" :src="logo" alt="Logo">
    </router-link>
</template>
<script>
  import logo from "@/assets/images/logo.png";

  export default {
    
    data() {
      return {
        logo
      }
    },

    computed: {

    }

  }
</script>