<template>
    <div>
        <img class="w-48 h-48 rounded-full object-cover"
             :src="$page.props.user.profile_photo_url"
             ref="profile_picture"
        />

        <div @click.prevent="deletePhoto"
             class="cursor-pointer"
        >
            Foto verwijderen
        </div>

        <label for="file"
               class="cursor-pointer"
        >
            Foto uploaden
        </label>
        <input ref="profile_picture_input"
               type="file"
               id="file"
               class="hidden"
               @input.prevent="updateProfileInformation"
               accept="image/jpeg, image/png"
        />
    </div>
</template>

<script>
import {Link, useForm} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
export default {
    name: "ProfilePicture",
    components: {
        Link
    },
    data() {
        return {
            form: useForm({
                _method: 'PUT',
                photo: null
            })
        }
    },
    methods: {
         deletePhoto() {
            Inertia.delete(this.route('current-user-photo.destroy'), {
                preserveScroll: true,
                onSuccess: () => {
                    this.$refs['profile_picture'].value = null;
                    this.clearPhotoFileInput();
                },
            });
        },
        updateProfileInformation() {
            if (this.$refs['profile_picture_input'].value) {
                this.form.photo = this.$refs['profile_picture_input'].files[0];
            }

            this.form.post(this.route('user-profile-information.update'), {
                errorBag: 'updateProfileInformation',
                preserveScroll: true,
            });
        }
    }
}
</script>
