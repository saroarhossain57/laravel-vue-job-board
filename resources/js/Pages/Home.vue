<template>
    <div class="container mx-auto my-16">
        <JobsList />
    </div>
</template>
  
<script>
    import JobsList from '../Components/JobBoard/JobsList.vue';
    export default {
        components: {
            'JobsList': JobsList,
        }
    }
</script>