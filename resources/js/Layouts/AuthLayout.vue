<template>
    <div class="w-[90vw] mx-auto">
        <nav>

        </nav>

        <section class="grid grid-cols-2">
            <div>
                <slot/>
            </div>

            <div>
                <Carousel class="w-1/2 mx-auto">
                    <Slide v-for="(slide, index) in slides" :key="index">
                        <div class="grid grid-rows-2">
                            <div>
                                <img :src="slide.image"
                                     :alt="slide.title"
                                     class="rounded-3xl"
                                />
                            </div>

                            <div class="mt-12">
                                <h3 class="text-4xl font-bold"
                                    v-text="slide.title"
                                />

                                <p class="mt-12 text-left"
                                   v-text="slide.description"
                                />
                            </div>
                        </div>
                    </Slide>

                    <template #addons>
                        <Navigation/>
                        <Pagination/>
                    </template>
                </Carousel>
            </div>
        </section>
    </div>
</template>

<script>
import {Carousel, Navigation, Pagination, Slide} from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

export default {
    name: "AuthLayout",
    data() {
        return {
            slides: [
                {
                    image: 'https://customerfirst.nl/__uuid/de178c9c-9e09-49c0-b084-106fbab97b6b/onzeker.jpg',
                    title: 'Onzekerheid, wat nu',
                    description: 'At vero eos et accusamus et iusto odio dignissimos ducimus !qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id q!'
                },
                {
                    image: 'https://customerfirst.nl/__uuid/de178c9c-9e09-49c0-b084-106fbab97b6b/onzeker.jpg',
                    title: 'Life sucks sometimes',
                    description: 'At vero eos et accusamus et iusto odio dignissimos ducimus !qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id q!'
                },
                {
                    image: 'https://customerfirst.nl/__uuid/de178c9c-9e09-49c0-b084-106fbab97b6b/onzeker.jpg',
                    title: 'Je staat er niet alleen voor',
                    description: 'At vero eos et accusamus et iusto odio dignissimos ducimus !qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id q!'
                }
            ]
        }
    },
    components: {
        Carousel,
        Navigation,
        Pagination,
        Slide
    }
}
</script>

<style>
    .carousel__prev--in-active,
    .carousel__next--in-active {
        display: none;
    }

    .carousel__prev, .carousel__next{
        top: 98%!important;
        background: black!important;
    }

    .carousel__pagination{
        margin-top: 4vh;
    }

    .carousel__pagination-button{
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #3E3E3E;
    }

    .carousel__pagination-button--active{
        background: #CCCCCC;
    }
</style>
