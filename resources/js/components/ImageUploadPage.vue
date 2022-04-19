<script setup>

import {onMounted, ref, Suspense, watch} from "vue";
import ImageGallery from "./ImageGallery";
import ImageInput from "./ImageInput";
import axios from "axios";


let images = ref(await axios.get('/images').then((res) => res.data));


function newImage(image) {
    images.value.push(image);
}
</script>

<template>

    <ImageInput @newImage="newImage"/>

    <ImageGallery  :images="images" v-if="images"/>
</template>

<style scoped>

</style>
