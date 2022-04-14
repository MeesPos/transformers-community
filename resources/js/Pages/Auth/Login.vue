<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '../../Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '../../Jetstream/AuthenticationCardLogo.vue';
import JetButton from '../../Jetstream/Button.vue';
import JetInput from '../../Jetstream/Input.vue';
import JetCheckbox from '../../Jetstream/Checkbox.vue';
import JetLabel from '../../Jetstream/Label.vue';
import JetValidationErrors from '../../Jetstream/ValidationErrors.vue';
import AuthLayout from "../../Layouts/AuthLayout";

export default {
    components: {
        Head,
        Link,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors
    },
    props: {
        canResetPassword: Boolean,
        status: String
    },
    data() {
        return {
            form: useForm({
                email: '',
                password: ''
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('login'), {
                onFinish: () => this.form.reset('password'),
            });
        }
    },
    layout: AuthLayout
}
</script>

<template>
    <div class="w-[80%] mx-auto sm:ml-0">
        <h2 class="text-6xl text-brand-purple">Inloggen</h2>

        <p class="mt-10">Vul hier onder je gevens in om in te loggen op het platform. Heeft u nog geen account via het menu kunt u een account aanmaken.</p>

        <JetValidationErrors class="mt-6" />

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

                    <tr>
                        <td>
                            <JetLabel for="password" value="Wachtwoord" />
                        </td>

                        <td>
                            <JetInput
                                id="password"
                                v-model="form.password"
                                type="password"
                                class="mt-1 block w-full"
                                required
                                autocomplete="current-password"
                            />
                        </td>
                    </tr>
                </tbody>
            </table>

            <JetButton>
                Inloggen
            </JetButton>

            <div class="relative my-12">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t-[3px] border-brand-pink" />
                </div>
                <div class="relative flex justify-center">
                    <span class="px-8 bg-white text-lg font-bold"> Of gebruik </span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-8 items-center justify-end">
                <JetButton type="button">
                    Help
                </JetButton>

                <a :href="route('password.request')">
                    <JetButton type="button">
                        Wachtwoord vergeten
                    </JetButton>
                </a>
            </div>
        </form>
    </div>
</template>
