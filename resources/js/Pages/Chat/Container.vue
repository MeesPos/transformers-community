<template>
    <div class="grid grid-cols-5">
        <div class="w-96 border-r-2 border-brand-pink">
            <ChatRoomSelection v-if="currentRoom.id"
                :rooms="chatRooms"
                :currentRoom="currentRoom"
                v-on:roomchanged="setRoom($event)"
            />
        </div>

        <div class="col-span-4 h-full w-4/5 mx-auto">
            <div v-if="currentRoom.users" class="grid grid-cols-2 items-center my-12">
                <div class="flex flex-row gap-12 items-center">
                    <img class="w-12 h-12 rounded-full object-cover"
                         :src="currentRoom.users.other.profile_photo_url"
                    />

                    <h2 class="font-lalezar text-brand-purple text-4xl" v-text="currentRoom.users.other.username" />
                </div>

                <div>
                    <InformationCircleIcon class="w-6 h-6 float-right text-brand-aqua" />
                </div>
            </div>
            <MessageContainer :messages="messages" />
            <InputMessage :room="currentRoom"
                v-on:messagesent="getMessages"
            />
        </div>
    </div>
</template>

<script>
import MessageContainer from "./MessageContainer";
import InputMessage from "./InputMessage";
import ChatRoomSelection from "./ChatRoomSelection";
import DashboardLayout from "../../Layouts/DashboardLayout";
import { InformationCircleIcon } from '@heroicons/vue/solid'

export default {
    name: "Container",
    components: {
        MessageContainer,
        InputMessage,
        ChatRoomSelection,
        InformationCircleIcon
    },
    layout: DashboardLayout,
    data() {
        return {
            chatRooms: [],
            currentRoom: [],
            messages: []
        }
    },
    watch: {
        currentRoom(val, oldVal) {
            if (oldVal.id) {
                this.disconnect(oldVal);
            }

            this.connect();
        }
    },
    methods: {
        connect() {
            if (this.currentRoom.id) {
                let vm = this;

                this.getMessages();

                window.Echo.private("chat." + this.currentRoom.id)
                    .listen('.message.new', e => {
                        vm.getMessages();
                    });
            }
        },
        disconnect(room) {
            window.Echo.leave("chat." + room.id);
        },
        getRooms() {
            axios.get('/chat/rooms')
                .then(response => {
                    this.chatRooms = response.data;

                    console.log(response.data);

                    this.setRoom(response.data[0]);
                })
                .catch(error => {
                    console.log(error.response.data);
                })
        },
        setRoom(room) {
            this.currentRoom = room;
        },
        getMessages() {
            axios.get('/chat/room/' + this.currentRoom.id + '/messages')
                .then(response => {
                    this.messages = response.data;
                })
                .catch(error => {
                    console.log(error.response.data);
                })
        }
    },
    created() {
        this.getRooms();
    }
}
</script>
