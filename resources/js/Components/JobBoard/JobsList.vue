<template>

    <div class="grid grid-cols-3 gap-6">
        <JobItem />
        <JobItem />
        <JobItem />
        <JobItem />
        <JobItem />
        <JobItem />
    </div>
    <div class="flex justify-center mt-6">
        <nav class="bg-white px-4 py-3 rounded-lg">
            <ul class="flex flex-wrap">
                <li><a href="#" class="bg-gray-200 hover:bg-gray-300 py-2 px-3 rounded-lg mr-2">1</a></li>
                <li><a href="#" class="bg-gray-200 hover:bg-gray-300 py-2 px-3 rounded-lg mr-2">2</a></li>
                <li><a href="#" class="bg-gray-200 hover:bg-gray-300 py-2 px-3 rounded-lg mr-2">3</a></li>
                <li><a href="#" class="bg-gray-200 hover:bg-gray-300 py-2 px-3 rounded-lg">Next</a></li>
            </ul>
        </nav>
    </div>
</template>

<script>
    import JobItem from './JobItem.vue';

    export default {
        components: {
            JobItem
        }
    }
</script>
