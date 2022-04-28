<template>
    <div class="max-w-[33%]" :class="$page.props.user.username === message.user.username ? 'float-right' : ''">
        <div class="flex flex-row gap-4 items-center" :class="$page.props.user.username === message.user.username ? 'text-right flex-row-reverse' : ''">
            <img class="w-12 h-12 rounded-full"
                 :src="message.user.profile_photo_url"
            />

            <p>
                <span v-if="$page.props.user.username === message.user.username" v-text="'Jij'" />

                <span v-else v-text="message.user.username" />

                -

                {{ moment(message.created_at).format('HH:mm') }}
            </p>
        </div>

        <div class="bg-gray-400 rounded-md p-3 m-3">
            <p v-text="message.message" />
        </div>
    </div>
</template>

<script>
import moment from 'moment';

export default {
    name: "Container",
    props: {
        message: {
            required: true
        }
    },
    data() {
        return {
            moment: moment
        }
    }
}
</script>
