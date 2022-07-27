<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';

const images = [
    "https://picsum.photos/id/237/320/320",
    "https://picsum.photos/id/233/320/320",
    "https://picsum.photos/id/27/320/320",
    "https://picsum.photos/id/437/320/320",
    "https://picsum.photos/id/137/320/320",
    "https://picsum.photos/id/37/320/320",
    "https://picsum.photos/id/837/320/320",
    "https://picsum.photos/id/337/320/320",
];

</script>

<template>

    <Head title="Documents" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Accueil
            </h2>
        </template>


        <div>
            <!--hotels-->
            <div>
                <h2>Hotels</h2>
            </div>

            <!--universities-->
            <div>
                <h2>Universities</h2>
            </div>

            <!--markets-->
            <div>
                <h2>Markets</h2>
            </div>

            <!--cities-->
            <div>
                <h2>Cities</h2>
            </div>

            <!-- <Carousel :items-to-show="2.5" :wrap-around="true" :autoplay="2000">
                <Slide v-for="image in images" :key="image">
                    <div class="carousel__item">
                        <img :src="image" alt="testing image..." />
                    </div>
                </Slide>

                <template #addons>
                </template>
            </Carousel> -->
        </div>
    </BreezeAuthenticatedLayout>
</template>

<style>
.carousel__item {
    min-height: 200px;
    width: 100%;
    background-color: #642afb;
    color: #ffffff;
    font-size: 20px;
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.carousel__slide {
    padding: 10px;
}

.carousel__prev,
.carousel__next {
    box-sizing: content-box;
    border: 5px solid white;
}

.carousel__slide>.carousel__item {
    transform: scale(1);
    opacity: 0.5;
    transition: 0.5s;
}

.carousel__slide--visible>.carousel__item {
    opacity: 1;
    transform: rotateY(0);
}

.carousel__slide--next>.carousel__item {
    transform: scale(0.9) translate(-10px);
}

.carousel__slide--prev>.carousel__item {
    transform: scale(0.9) translate(10px);
}

.carousel__slide--active>.carousel__item {
    transform: scale(1.1);
}
</style>
