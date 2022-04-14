<script>
import { Head, useForm, Link } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';
import AuthLayout from "../../Layouts/AuthLayout";

export default {
    components: {
        Head,
        Link,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetLabel,
        JetValidationErrors
    },
    data() {
        return {
            form: useForm({
                email: '',
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('password.email'), {
                onSuccess: () => this.$inertia.get('/email-sent')
            });
        }
    },
    layout: AuthLayout
}
</script>

<template>
    <div class="w-[80%] mx-auto sm:ml-0">
        <h2 class="text-6xl text-brand-purple">Wachtwoord vergeten</h2>

        <p class="mt-10">Wachtwoord vergeten? Geen probleem! Vul hier onder het e-mail adres in waar al eerder mee heeft in gelogd.</p>

        <JetValidationErrors class="mt-6" />

        <div v-if="status" class="mt-6 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <table class="w-full" style="border-spacing: 0 32px; border-collapse: separate">
                <tbody>
                <tr>
                    <td>
                        <JetLabel for="email" value="E-mailadres" />
                    </td>

                    <td>
                        <JetInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full"
                            required
                            autofocus
                        />
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="grid grid-cols-2 gap-8 items-center justify-end">
                <Link :href="route('login')">
                    <JetButton type="button">
                        Terug
                    </JetButton>
                </Link>

                <JetButton>
                    Versturen
                </JetButton>
            </div>
        </form>
    </div>
</template>
