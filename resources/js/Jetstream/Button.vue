<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button
        :type="type"
        class="w-full bg-brand-aqua h-16 font-bold rounded-xl text-md"
    >
        <slot />
    </button>
</template>
