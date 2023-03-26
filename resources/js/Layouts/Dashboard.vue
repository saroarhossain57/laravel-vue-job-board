<template>
    <main class="flex lara-job-dashboard">
        <Sidebar />
        <div class="grow py-8 px-6">
            <slot />
        </div>
    </main>
</template>

<script>
import Sidebar from '../Components/TemplateParts/Dashboard/Sidebar.vue';
export default {
    components: {
        Sidebar
    }
}
</script>
