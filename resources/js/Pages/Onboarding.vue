<template>
    <div class="text-center">
        <img src="images/logo.png"
             alt="Logo Transformers Community"
             class="w-96 mx-auto my-8"
        />

        <div>
            <ProgressBar />
        </div>

        <h1 class="font-lalezar text-7xl text-brand-purple">Over je gevoelens praten</h1>
    </div>
</template>

<script>
import ProgressBar from "../Components/ProgressBar";
export default {
    name: "Onboarding",
    components: {ProgressBar}
}
</script>
