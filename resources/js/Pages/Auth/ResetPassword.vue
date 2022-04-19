<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';
import AuthLayout from "../../Layouts/AuthLayout";

export default {
    props: {
        email: String,
        token: String
    },
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
    data(props) {
        return {
            form: useForm({
                token: props.token,
                email: props.email,
                password: '',
                password_confirmation: '',
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('password.update'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            });
        }
    },
    layout: AuthLayout
}
</script>

<template>
    <div class="w-[80%] mx-auto sm:ml-0">
        <h2 class="text-7xl text-brand-purple font-lalezar">Wachtwoord veranderen</h2>

        <p class="mt-10">Wachtwoord vergeten, geen probleem. Vul hier onder het e-mail adres in waar al eerder mee heeft in gelogd. </p>

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
                                autocomplete="new-password"
                            />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <JetLabel for="password_confirmation" value="Bevestig wachtwoord" />
                        </td>

                        <td>
                            <JetInput
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                type="password"
                                class="mt-1 block w-full"
                                required
                                autocomplete="new-password"
                            />
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="flex items-center justify-end mt-4">
                <JetButton>
                    Wachtwoord veranderen
                </JetButton>
            </div>
        </form>
    </div>
</template>
