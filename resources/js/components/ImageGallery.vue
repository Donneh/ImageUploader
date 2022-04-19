<script setup>

defineProps({
    images: Array
})


</script>

<template>
    <div class="mt-8 mb-24">
        <h3 class="text-2xl font-medium text-center">Image Gallery</h3>
        <div class="grid grid-cols-3 gap-2 justify-evenly mt-4">
            <div v-for="(image, index) in images" :key="index">
                <img :src="'/storage/images/' + image" alt="">
            </div>
        </div>
    </div>
</template>
