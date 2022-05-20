<template>
    <div class="text-center">
        <img src="images/logo.png"
             alt="Logo Transformers Community"
             class="w-64 mx-auto my-8"
        />

        <div>
<!--            <ProgressBar v-model:currentStep="currentStep" />-->
            <nav class="mt-12 mb-8">
                <ol role="list" class="flex items-center justify-center">
                    <li v-for="(step, stepIdx) in progressBarSteps" :key="step.name" :class="[stepIdx !== steps.length - 1 ? 'pr-8 sm:pr-36' : '', 'relative']">
                        <template v-if="currentStep === step.name">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="h-1 bg-brand-orange" :class="step.name === currentStep ? 'w-7/12' : 'w-full'" />
                                <div class="h-1 bg-brand-purple" :class="step.name === currentStep ? 'w-5/12' : 'hidden'" />
                            </div>
                            <div class="relative w-10 h-10 flex items-center justify-center bg-brand-orange rounded-full">
                                <span class="text-white font-montserrat font-bold text-xl">{{ step.name }}</span>
                            </div>
                        </template>
                        <template v-else-if="currentStep > step.name">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="h-1 bg-brand-orange w-full" />
                            </div>
                            <div class="relative w-10 h-10 flex items-center justify-center bg-brand-orange rounded-full">
                                <span class="text-white font-montserrat font-bold text-xl">{{ step.name }}</span>
                            </div>
                        </template>
                        <template v-else>
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="h-1 w-full bg-brand-purple" />
                            </div>
                            <div class="group relative w-10 h-10 flex items-center justify-center bg-white bg-brand-dark-blue rounded-full">
                                <span class="text-white font-montserrat font-bold text-xl">{{ step.name }}</span>
                            </div>
                        </template>
                    </li>
                </ol>
            </nav>
        </div>

        <h1 class="font-lalezar text-6xl text-brand-purple" v-text="steps[currentStep - 1].title" />

        <p class="w-[900px] text-left mx-auto text-md mt-4" v-text="steps[currentStep - 1].description" />

        <video autoplay="autoplay" width="900" height="400" class="mx-auto mt-4">
            <source src="/videos/step-2.mp4" type="video/mp4" />
        </video>

        <div class="grid grid-cols-2 w-[900px] mx-auto mt-8">
            <button class="bg-brand-aqua font-bold font-montserrat text-lg w-[260px] py-3 rounded-md">Uitleg overslaan</button>

            <button class="bg-brand-aqua font-bold font-montserrat text-lg w-[260px] py-3 place-self-end rounded-md" v-if="currentStep !== 4" @click="currentStep = currentStep + 1">Volgende</button>
        </div>
    </div>
</template>

<script>
import ProgressBar from "../Components/ProgressBar";

export default {
    name: "Onboarding",
    components: {ProgressBar},
    data() {
        return {
            currentStep: 1,
            steps: [
                {
                    title: 'Welkom bij Transformers Community',
                    description: 'Welkom bij Transfromers Community.  Leuk dat je heb aangemeld voor onze website en je bij de community wil voegen.  Voordat je kan beginnen leggen we even de basis uit van onze website en hoe je het kan gebruiken voor jou alleen of met elkaar.  Hieronder zie de home pagina van de website, hier kan je alle berichten zien van de community en je eigen berichten plaatsen.',
                    video: ''
                },
                {
                    title: 'Over je gevoelens praten',
                    description: 'Wil graag met iemand privé over een onderwerp praten. Dan kan dat via onze aparte chat pagina. Iedereen die lid is van Transformers Community kan gebruik maken van het chat programma.  Door gebruik te maken van de zoekbalk kan je een nieuwe chat opstarten met iemand.  Je kan foto en berichten naar elkaar sturen.',
                    video: ''
                },
                {
                    title: 'Menu gebruik van de website',
                    description: 'Via het menu kan je door de website heen bewegen.  Je kunt terug naar de homepagina of naar je account om daar je profielfoto te veranderen. Of bij instellingen waar je meldingen aan kan passen of je website in de dark mode te zetten.',
                    video: ''
                },
                {
                    title: 'Klaar om te beginnen',
                    description: 'Klaar om Transformers  Community te gebruiken.',
                    video: ''
                }
            ],
            progressBarSteps: [
                { name: 1, status: this.getStatus(1) },
                { name: 2, status: this.getStatus(2) },
                { name: 3, status: this.getStatus(3) },
                { name: 4, status: this.getStatus(4) }
            ]
        }
    },
    methods: {
        getStatus(step) {
            return 'upcoming';
        }
    }
}
</script>
