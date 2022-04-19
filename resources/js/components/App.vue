<script setup>
import vueFilePond from "vue-filepond";
import FilePondPluginsFileValidateType from 'filepond-plugin-file-validate-type';

const filePond = new vueFilePond(FilePondPluginsFileValidateType);

function filePondInitialized() {
    console.log(filePond);
}
</script>

<template>
    <div class="mt-4">
        <file-pond name="image"
                   ref="pond"
                   label-idle="Choose or drag image ..."
                   allow-multiple="true"
                   server="/upload"
                   @init="filePondInitialized"
                   accepted-file-types="image/*"
        />
    </div>
</template>

<style scoped>
@import 'filepond/dist/filepond.min.css';
</style>
