<template>
    <Header />
    <router-view />
</template>
<script>
  import Header from './Components/TemplateParts/Header.vue';
  export default {
    
    components: {
      Header
    }
  }
</script>