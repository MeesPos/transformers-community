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
                class="flex flex-row items-center gap-4"
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
                class="cursor-pointer"
                v-show="searchQuery === ''"
            >
                {{ room.users.other.username }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Container",
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
            noResults: false
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

                    if (this.searchResults.length === 0) {
                        this.noResults = true;
                    }
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
