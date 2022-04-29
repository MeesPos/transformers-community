<template>
    <div>
        <div>
            <input
                type="text"
                @input.prevent="search($event)"
                placeholder="Zoeken..."
                ref="searchInput"
                v-model="searchQuery"
            />
        </div>

        <div>
            <div
                v-for="searchResult in searchResults"
                :key="searchResult.id"
                @click.prevent="createRoom(searchResult)"
                class="flex flex-row items-center gap-4 cursor-pointer"
            >
                <div>
                    <img class="w-12 h-12 rounded-full"
                         :src="searchResult.profile_photo_url"
                    />
                </div>

                <div>
                    <p class="font-medium" v-text="searchResult.username" />
                </div>
            </div>

            <div v-show="noResults === true">
                <p>Geen resultaten!</p>
            </div>

            <div
                v-for="(room, index) in rooms"
                :key="index"
                @click="$emit('roomchanged', room)"
                class="flex flex-row items-center gap-4 cursor-pointer"
                v-show="searchQuery === ''"
            >
                <div>
                    <img class="w-12 h-12 rounded-full"
                         :src="room.users.other.profile_photo_url"
                    />
                </div>

                <div>
                    <div class="flex flex-row gap-8">
                        <p class="font-medium" v-text="room.users.other.username" />

                        <p class="text-right" v-if="moment(room.last_message.created_at).isBefore(moment().subtract(1, 'd'))" v-text="moment(room.last_message.created_at).format('D MMM')" />

                        <p class="text-right" v-else v-text="moment(room.last_message.created_at).format('HH:mm')"></p>
                    </div>

                    <p v-text="room.last_message.message.substring(0, 20) + '...'" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";

export default {
    name: "ChatRoomSelection",
    props: {
        rooms: {
            required: true
        },
        currentRoom: {
            required: true
        }
    },
    data() {
        return {
            selected: '',
            searchResults: [],
            searchQuery: '',
            noResults: false,
            moment: moment
        }
    },
    created() {
        console.log(this.searchResults);

        this.selected = this.currentRoom;
    },
    methods: {
        search(event) {
            if (event.target.value === '') {
                this.noResults = false;

                return this.searchResults = [];
            }

            axios.post('/search/' + event.target.value)
                .then(response => {
                    this.searchResults = response.data;

                    this.searchResults.forEach(searchResult => {
                        if (this.rooms.some(room => room.users.other.username === searchResult.username)) {
                            let index = this.searchResults.indexOf(searchResult);

                            if (index === 0) {
                                this.searchResults.shift();
                            }

                            this.searchResults.splice(index, 1);
                        }
                    })

                    this.noResults = this.searchResults.length === 0;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        createRoom(selectedUser) {
            axios.post('/rooms/create/' + selectedUser.id)
                .then(response => {
                    this.$emit('roomchanged', response.data);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>
