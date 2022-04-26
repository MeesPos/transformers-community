<template>
    <div>
        <div>
            <input
                type="text"
                @input.prevent="search($event)"
                placeholder="Zoeken..."
            />
        </div>

        <div>
            <div
                v-for="searchResult in searchResults"
                :key="searchResult.id"
                @click.prevent="createRoom(searchResult)"
            >
                {{ searchResult.username }}
            </div>
        </div>

        <div>
            <select
                v-model="selected"
                @change="$emit('roomchanged', selected)"
                class="float-right"
            >
                <option
                    v-for="(room, index) in rooms"
                    :key="index"
                    :value="room"
                >
                    {{ room.name }}
                </option>
            </select>
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
            searchResults: []
        }
    },
    created() {
        this.selected = this.currentRoom;
    },
    methods: {
        search(event) {
            axios.post('/search/' + event.target.value)
                .then(response => {
                    this.searchResults = response.data;

                    console.log(this.searchResults);
                })
                .catch(error => {
                    console.log(error.data);
                })
        },
        createRoom(selectedUser) {
            axios.post('/rooms/create/' + selectedUser.id)
                .then(response => {
                    this.$emit('roomchanged', response.data);

                    console.log(response.data);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>
