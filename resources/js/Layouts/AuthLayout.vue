<template>
    <div class="sm:w-[90vw] mx-auto font-montserrat">
        <nav>
            <section class="relative w-full text-gray-700 bg-white my-4 body-font">
                <div class="flex flex-col flex-wrap items-center justify-between py-5 mx-auto lg:flex-row sm:max-w-[90vw]">
                    <Link href="#_" class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-black select-none">
                        <img src="/images/logo.png" class="w-48" />
                    </Link>

                    <nav class="top-0 left-0 z-0 xs:flex items-center justify-center w-full h-full py-5 -ml-0 xs:space-x-12 text-base lg:-ml-5 lg:py-0 lg:absolute grid grid-cols-2 w-[90vw] xs:w-full">
                        <Link v-for="(navigationItem, index) in navigationItems"
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
                        </Link>
                    </nav>

                    <div class="relative z-10 inline-flex items-center space-x-12 lg:ml-5 lg:justify-end">
                        <Link href="/login" x-data="{ hover: false }"
                           class="relative inline-block text-base font-bold text-brand-purple transition duration-150 ease white">
                            <span class="block">Log in</span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-2 overflow-hidden">
                                <span class="absolute inset-0 inline-block w-full h-1 h-full transform translate-x-0 border-t-3 border-gray-500 bg-brand-purple" />
                            </span>
                            <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-2 overflow-hidden">
                            </span>
                        </Link>
                        <span class="inline-flex rounded-md shadow-sm">
                <Link href="/register" class="inline-flex items-center font-bold text-sm justify-center px-16 py-3 text-base font-medium leading-6 text-white whitespace-no-wrap hover:bg-brand-purple bg-brand-orange rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-orange">
                    Aanmelden
                </Link>
            </span>
                    </div>
                </div>
            </section>
        </nav>

        <section class="grid sm:grid-cols-2 items-center">
            <div>
                <slot/>
            </div>

            <div>
                <Carousel class="w-3/4 mx-auto sm:mr-0 mt-12 sm:mt-0">
                    <Slide v-for="(slide, index) in slides" :key="index">
                        <div class="grid grid-rows-[auto_1fr]">
                            <div>
                                <img :src="slide.image"
                                     :alt="slide.title"
                                     class="rounded-3xl w-full"
                                />
                            </div>

                            <div class="mt-12">
                                <h3 class="text-3xl font-bold"
                                    v-text="slide.title"
                                />

                                <p class="mt-12 text-left"
                                   v-html="slide.description"
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
import { Link } from '@inertiajs/inertia-vue3';
import {Carousel, Navigation, Pagination, Slide} from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

export default {
    name: "AuthLayout",
    data() {
        return {
            slides: [
                {
                    image: '/images/slides/1.png',
                    title: 'Ik voel mij verdomt alleen',
                    description: 'In deze story vertelt Amber hoe ze zich soms voelt en hoe ze er mee om gaat. ‘Ik heb diep van binnen de overtuiging dat ik alles alleen moet doen’. Ze geeft tips hoe ze hier mee omgaat. Benieuwd naar de hele story? Maak snel een account aan. Of heb je al een account? Log dan snel in.'
                },
                {
                    image: '/images/slides/2.png',
                    title: 'Eenzaamheid onder jongeren',
                    description: 'In een kleine documentaire word vertelt over de eenzaamheid onder jongeren. Wil je de hele documentaire zien, meld je dan snel aan voor Transformers Community.<br><br><br>'
                },
                {
                    image: '/images/slides/3.png',
                    title: 'Waarom moet ik perfect zijn',
                    description: 'Tegenwoordig krijg je als student best wel het gevoel dat alles perfect moet zijn. Alleen maar goede cijfers, meer dan 100% geven. In deze story vertelt Sam meer over perfectie onder student en hoe hij zich daar bij voelt.<br><br>'
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
        Slide,
        Link
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
        background: #4D8CF0!important;
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
        background: #29D5D7;
        /*background: #3E3E3E;*/
    }
</style>
