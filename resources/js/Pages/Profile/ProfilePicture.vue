<template>
    <div class="w-96 border-r-2 border-brand-pink">
        <div>
            <h2 class="font-lalezar text-brand-purple text-5xl mt-8 mb-4 pl-8">Profiel</h2>

            <div class="flex flex-row items-end justify-center mt-12">
                <img class="w-48 h-48 rounded-full -z-10 object-cover"
                     :src="$page.props.user.profile_photo_url"
                     ref="profile_picture"
                />

                <div class="cursor-pointer"
                     :class="editProfilePicture ? '-z-10' : 'z-0'"
                     @click="editProfilePicture = true"
                >
                    <PencilIcon class="w-8 h-8" />
                </div>
            </div>

            <div v-show="editProfilePicture" ref="editToolBox" class="bg-[#FCFCFC] w-max p-3 rounded-md shadow-sm z-50 mx-auto mr-6 -mt-16">
                <div @click.prevent="deletePhoto"
                     class="cursor-pointer mb-2"
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
        </div>
    </div>
</template>

<script>
import {Link, useForm} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import DashboardLayout from "../../Layouts/DashboardLayout";
import { PencilIcon } from '@heroicons/vue/solid';

export default {
    name: "ProfilePicture",
    components: {
        Link,
        PencilIcon
    },
    layout: DashboardLayout,
    data() {
        return {
            form: useForm({
                _method: 'PUT',
                photo: null
            }),
            editProfilePicture: false
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
