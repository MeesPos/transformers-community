<template>
    <div class="w-full h-full">
        <div class="h-full p-2 flex flex-col-reverse">
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
