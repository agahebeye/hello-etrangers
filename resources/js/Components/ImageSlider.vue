<script setup>
import { ref } from 'vue';

const images = [
    "https://i.picsum.photos/id/1/200/300.jpg?hmac=jH5bDkLr6Tgy3oAg5khKCHeunZMHq0ehBZr6vGifPLY",
    "https://i.picsum.photos/id/2/200/300.jpg?hmac=HiDjvfge5yCzj935PIMj1qOf4KtvrfqWX3j4z1huDaU",
    "https://i.picsum.photos/id/3/200/300.jpg?hmac=o1-38H2y96Nm7qbRf8Aua54lF97OFQSHR41ATNErqFc",
];

const index = ref(0);
const image = ref(images[0])

function next() {
    index.value = (index.value - 1) % images.length;
    image.value = images[index.value];
}

function previous() {
    index.value = (index.value - 1) % images.length;
    image.value = images[index.value];
}
</script>

<template>
    <div>
        <button @click="previous">&lt;</button>
        <img :src="image" />
        <button @click="next">&gt;</button>
    </div>
</template>
