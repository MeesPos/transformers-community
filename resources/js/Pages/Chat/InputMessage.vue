<template>
    <div class="relative h-[52px] mt-12">
        <div class="flex gap-6 items-center h-[52px]">
            <input type="text"
                v-model="message"
                @keyup.enter="sendMessage()"
                placeholder="Typ jouw bericht"
                class="w-full outline-none h-[52px] bg-brand-gray-input-chat border-none rounded-md text-lg pl-8 text-black"
            />

            <img
                src="/images/send-icon.png"
                @click="sendMessage()"
                class="h-[60%] mt-[11px]"
                alt="Send icon"
            />
        </div>
    </div>
</template>

<script>
export default {
    name: "InputMessage",
    props: {
        room: {
            required: true
        }
    },
    data() {
        return {
            message: ''
        }
    },
    methods: {
        sendMessage() {
            if (this.message === ' ') {
                return;
            }

            axios.post('/chat/room/' + this.room.id + '/message', {
                message: this.message
            })
            .then(response => {
                if (response.status == 201) {
                    this.message = '';

                    this.$emit('messagesent');
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>
