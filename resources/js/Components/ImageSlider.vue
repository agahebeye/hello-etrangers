<script setup>
import { computed } from '@vue/reactivity';
import { ref, onMounted } from 'vue';

const images = ref([
    "https://picsum.photos/id/237/320/320",
    "https://picsum.photos/id/233/320/320",
    "https://picsum.photos/id/27/320/320",
    "https://picsum.photos/id/437/320/320",
    "https://picsum.photos/id/137/320/320",
    "https://picsum.photos/id/37/320/320",
    "https://picsum.photos/id/837/320/320",
    "https://picsum.photos/id/337/320/320",
]);

const index = ref(0);
const sX = ref(20);
const image = ref(images[0])

let last = 0;
let num = 0;
let speed = 2;

function slideImages(time) {
    let seconds = time / 1000;
    if (seconds - last >= speed) {
        console.log(seconds, num, last)
        let firstImage = images.value[0];
        for (let img = 0; img < images.value.length; ++img) {
            images.value[img] = images.value[(img + 1) % images.value.length]
        }

        images.value[images.value.length - 1] = firstImage;
        last = seconds;
        ++num;
    }

    requestAnimationFrame(slideImages);
}

onMounted(function () {
    requestAnimationFrame(slideImages)
    // let interval = setInterval(() => {
    //     slideImages()
    // }, 3000);

})

</script>

<template>
    <div class="relative overflow-hidden">
        <button @click="slideImages">slideImages me</button>
        <h2 class="text-4xl">Hotels</h2>
        <div class="w-[1680px] flex space-x-2 bg-white">
            <div class="flex-1" v-for="image in images">
                <h3 class="text-2xl font-medium">Lorem ipsum dolor sit amet.</h3>
                <img class="max-w-full object-cover" :src="image" />
                <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, minima!</div>
            </div>
        </div>
    </div>
</template>
