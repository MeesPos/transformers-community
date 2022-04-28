<template>
    <div>
        <img class="w-48 h-48 rounded-full" :src="$page.props.user.profile_photo_url" />

        <Link method="post" :href="route('profile-picture.delete')">Foto verwijderen</Link>

        <label for="file">Foto uploaden</label>
        <input type="file" id="file" class="hidden" @input.prevent="upload($event)" accept="image/jpeg, image/png">
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
export default {
    name: "ProfilePicture",
    components: {
        Link
    },
    methods: {
        upload(event) {
            let data = new FormData();

            data.append('image', event.target.files[0]);

            console.log(event.target.files[0]);

            axios.post('/profile-picture/upload', data)
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>
