<script setup>
import vueFilePond, {setOptions} from "vue-filepond";
import FilePondPluginsFileValidateType from 'filepond-plugin-file-validate-type';
import 'filepond/dist/filepond.min.css';
import axios from "axios";

const filePond = new vueFilePond(FilePondPluginsFileValidateType);

const emit = defineEmits(['newImage']);

setOptions({
    server: {
        process: {
            url: './upload',
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf_token"]').content
            }
        },
        revert: {
            url: './images/',
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf_token"]').content
            }
        }
    }
})

function handleProcessedFile(error, file) {
    if(error) {
        console.log(error);
        return;
    }

    emit("newImage", file.serverId);
}
</script>
<template>
    <div>
        <div class="mt-4">
            <file-pond name="image"
                       ref="pond"
                       label-idle="Choose or drag image ..."
                       allow-multiple="true"
                       accepted-file-types="image/*"
                       @processfile="handleProcessedFile"

            />
        </div>
    </div>
</template>
