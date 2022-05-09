<template>
    <div class="w-full h-[70vh] mt-8">
        <div class="p-2 flex flex-col-reverse h-[70vh] overflow-y-scroll">
            <div v-for="(message, index) in messages" :key="index">
                <MessageItem :message="message" />
            </div>
        </div>
    </div>
</template>

<script>
import MessageItem from './MessageItem'

export default {
    name: "Container",
    props: {
        messages: {
            required: true
        }
    },
    components: {
        MessageItem
    }
}
</script>
