<template>
    <Header />
    <router-view />
    <Footer />
</template>
<script>
  import Header from './Components/TemplateParts/Header.vue';
  import Footer from './Components/TemplateParts/Footer.vue';
  export default {
    
    components: {
      Header,
      Footer
    }
  }
</script>