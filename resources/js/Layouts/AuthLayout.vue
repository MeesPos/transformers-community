<template>
    <div class="w-[90vw] mx-auto font-montserrat">
        <nav>
            <section class="relative w-full text-gray-700 bg-white my-4 body-font">
                <div class="flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-[90vw]">
                    <a href="#_" class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-black select-none">
                        <img src="/images/logo.png" class="w-48" />
                    </a>

                    <nav class="top-0 left-0 z-0 flex items-center justify-center w-full h-full py-5 -ml-0 space-x-12 text-base md:-ml-5 md:py-0 md:absolute">
                        <a v-for="(navigationItem, index) in navigationItems"
                           :key="index"
                           :href="navigationItem.href"
                           class="relative font-medium leading-6 text-gray-600 transition duration-150 ease-out hover:text-brand-purple"
                           @mouseenter="hover = true"
                           @mouseleave="hover = false"
                        >
                            <span class="block"
                                v-text="navigationItem.title"
                            />
                            <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden"></span>
                        </a>
                    </nav>

                    <div class="relative z-10 inline-flex items-center space-x-12 md:ml-5 lg:justify-end">
                        <a href="#_" x-data="{ hover: false }"
                           class="relative inline-block text-base font-bold text-brand-purple transition duration-150 ease white">
                            <span class="block">Log in</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-2 overflow-hidden">
                                <span class="absolute inset-0 inline-block w-full h-1 h-full transform translate-x-0 border-t-3 border-gray-500 bg-brand-purple" />
                            </span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-2 overflow-hidden">
                            </span>
                        </a>
                        <span class="inline-flex rounded-md shadow-sm">
                <a href="#" class="inline-flex items-center font-bold text-sm justify-center px-16 py-3 text-base font-medium leading-6 text-white whitespace-no-wrap hover:bg-brand-purple bg-brand-orange rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-orange">
                    Aanmelden
                </a>
            </span>
                    </div>
                </div>
            </section>
        </nav>

        <section class="grid grid-cols-2">
            <div>
                <slot/>
            </div>

            <div>
                <Carousel class="w-1/2 mx-auto">
                    <Slide v-for="(slide, index) in slides" :key="index">
                        <div class="grid grid-rows-[auto_1fr]">
                            <div>
                                <img :src="slide.image"
                                     :alt="slide.title"
                                     class="rounded-3xl"
                                />
                            </div>

                            <div class="mt-12">
                                <h3 class="text-3xl font-bold"
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
            ],
            navigationItems: [
                {
                    title: 'Home',
                    href: ''
                },
                {
                    title: 'Online Community',
                    href: ''
                },
                {
                    title: 'Stories',
                    href: ''
                },
                {
                    title: 'Meer',
                    href: ''
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
        background: #CCCCCC;
    }

    .carousel__pagination-button--active{
        background: #3E3E3E;
    }
</style>
