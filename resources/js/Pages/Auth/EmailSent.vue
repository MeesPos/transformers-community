<template>
    <div class="w-[80%] mx-auto sm:ml-0">
        <h2 class="text-7xl text-brand-purple font-lalezar">E-mail is verstuurd!</h2>

        <p class="mt-10">E-mail is verstuurd! Check je mail waar je met een link het wachtwoord kunt veranderen.</p>

        <div v-if="status" class="mt-6 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <table class="w-full mt-8" style="border-spacing: 0 32px; border-collapse: separate">
            <tbody>
                <tr>
                    <td>
                        <p class="font-bold">E-mailadres</p>
                    </td>

                    <td>
                        {{ email }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mt-8 grid grid-cols-2 gap-8 items-center justify-end">
            <Link :href="route('login')">
                <JetButton type="button">
                    Terug
                </JetButton>
            </Link>

            <form @submit.prevent="submit">
                <JetButton>
                    E-mail opnieuw versturen
                </JetButton>
            </form>
        </div>
    </div>
</template>

<script>
import AuthLayout from "../../Layouts/AuthLayout";
import {Link, useForm} from '@inertiajs/inertia-vue3';
import JetButton from '../../Jetstream/Button.vue';

export default {
    name: "EmailSent",
    layout: AuthLayout,
    props: {
        email: String
    },
    components: {
        Link,
        JetButton
    },
    data(props) {
        return {
            form: useForm({
                email: props.email
            }),
            status: ''
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('password.email'), {
                onSuccess: () => this.status = 'E-mail is opnieuw verzonden!'
            });
        }
    }
}
</script>
