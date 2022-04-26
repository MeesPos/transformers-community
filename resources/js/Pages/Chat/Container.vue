<template>
    <div class="grid grid-cols-6">
        <div>
            <ChatRoomSelection v-if="currentRoom.id"
                :rooms="chatRooms"
                :currentRoom="currentRoom"
                v-on:roomchanged="setRoom($event)"
            />
        </div>

        <div class="col-span-5">
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

export default {
    name: "Container",
    components: {
        MessageContainer,
        InputMessage,
        ChatRoomSelection
    },
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

                    console.log(this.chatRooms);

                    this.setRoom(response.data[0]);
                })
                .catch(error => {
                    console.log(error);
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
