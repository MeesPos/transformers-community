<template>
    <div class="text-center">
        <img src="images/logo.png"
             alt="Logo Transformers Community"
             class="w-64 mx-auto my-8"
        />

        <div>
            <ProgressBar />
        </div>

        <h1 class="font-lalezar text-6xl text-brand-purple">Over je gevoelens praten</h1>

        <p class="w-[900px] text-left mx-auto text-md mt-4">Welkom bij Transfromers Community.  Leuk dat je heb aangemeld voor onze website en je bij de community wil voegen.  Voordat je kan beginnen leggen we even de basis uit van onze website en hoe je het kan gebruiken voor jou alleen of met elkaar.  Hieronder zie de home pagina van de website, hier kan je alle berichten zien van de community en je eigen berichten plaatsen.  </p>

        <video autoplay="autoplay" width="900" height="400" class="mx-auto mt-4">
            <source src="/videos/step-2.mp4" type="video/mp4" />
        </video>

        <div class="grid grid-cols-2 w-[900px] mx-auto mt-8">
            <button class="bg-brand-aqua font-bold font-montserrat text-lg w-[260px] py-3 rounded-md">Uitleg overslaan</button>

            <button class="bg-brand-aqua font-bold font-montserrat text-lg w-[260px] py-3 place-self-end rounded-md">Volgende</button>
        </div>
    </div>
</template>

<script>
import ProgressBar from "../Components/ProgressBar";

export default {
    name: "Onboarding",
    components: {ProgressBar}
}
</script>
