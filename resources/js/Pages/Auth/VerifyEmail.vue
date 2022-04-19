<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import AuthLayout from "../../Layouts/AuthLayout";

export default {
    components: {
        JetButton,
        Link
    },
    props: {
        status: String
    },
    data() {
        return {
            form: useForm()
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('verification.send'));
        }
    },
    layout: AuthLayout
}
</script>

<template>
    <div class="w-[80%] mx-auto sm:ml-0">
        <h2 class="text-6xl text-brand-purple font-lalezar">Welkom bij Transformers Community</h2>

        <p class="mt-10">Vul hier onder je gevens in om in te loggen op het platform. Heeft u nog geen account via het menu kunt u een account aanmaken.</p>

        <table class="w-full mt-8" style="border-spacing: 0 32px; border-collapse: separate">
            <tbody>
                <tr>
                    <td>
                        <p class="font-bold">E-mailadres</p>
                    </td>

                    <td>
                        {{ $page.props.user.email }}
                    </td>
                </tr>
            </tbody>
        </table>

        <form @submit.prevent="submit" class="mt-10">
            <div class="grid grid-cols-2 gap-8 items-center justify-end">
                <Link :href="route('register')">
                    <JetButton type="button">
                        Terug
                    </JetButton>
                </Link>

                <JetButton>
                    Verstuur e-mail opnieuw
                </JetButton>
            </div>
        </form>
    </div>
</template>
