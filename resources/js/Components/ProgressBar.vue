<template>
    <nav class="mt-12 mb-8">
        <ol role="list" class="flex items-center justify-center">
            <li v-for="(step, stepIdx) in steps" :key="step.name" :class="[stepIdx !== steps.length - 1 ? 'pr-8 sm:pr-36' : '', 'relative']">
                <template v-if="step.status === 'complete'">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="h-1 bg-brand-orange" :class="steps[steps.indexOf(step) + 1].status === 'current' ? 'w-7/12' : 'w-full'" />
                        <div class="h-1 bg-brand-purple" :class="steps[steps.indexOf(step) + 1].status === 'current' ? 'w-5/12' : 'hidden'" />
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
</template>

<script>
export default {
    name: "ProgressBar",
    data() {
        return {
            steps: [
                { name: '1', href: '#', status: 'complete' },
                { name: '2', href: '#', status: 'complete' },
                { name: '3', href: '#', status: 'current' },
                { name: '4', href: '#', status: 'upcoming' }
            ]
        }
    }
}
</script>

<style scoped>

</style>
