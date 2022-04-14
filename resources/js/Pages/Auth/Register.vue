<script>
    import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
    import JetAuthenticationCard from '../../Jetstream/AuthenticationCard';
    import JetAuthenticationCardLogo from '../../Jetstream/AuthenticationCardLogo';
    import JetButton from '../../Jetstream/Button';
    import JetInput from '../../Jetstream/Input';
    import JetCheckbox from '../../Jetstream/Checkbox';
    import JetLabel from '../../Jetstream/Label';
    import JetValidationErrors from '../../Jetstream/ValidationErrors';
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
        data() {
            return {
                form: useForm({
                    username: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    birth_date: '',
                    terms: false,
                })
            }
        },
        methods: {
            submit() {
                form.post(route('register'), {
                    onFinish: () => form.reset('password', 'password_confirmation'),
                });
            }
        },
        layout: AuthLayout
    }
</script>

<template>
    <div class="w-[80%] mx-auto sm:ml-0">
        <h2 class="text-6xl text-brand-purple">Aanmelden</h2>

        <p class="mt-10">Welkom bij Transformers Community. Vul hieronder al je levens in en maak snel je account aan.</p>

        <form @submit.prevent="submit">
            <table class="w-full" style="border-spacing: 0 32px; border-collapse: separate">
                <tbody>
                    <tr>
                        <td>
                            <JetLabel for="username" value="Gebruikersnaam"/>
                        </td>

                        <td>
                            <JetInput
                                id="username"
                                v-model="form.username"
                                type="text"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                autocomplete="username"
                            />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <JetLabel for="email" value="E-mailadres"/>
                        </td>

                        <td>
                            <JetInput
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="mt-1 block w-full"
                                required
                            />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <JetLabel for="password" value="Wachtwoord"/>
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
                            <JetLabel for="birth_date" value="Geboortedatum"/>
                        </td>

                        <td>
                            <JetInput
                                id="birth_date"
                                v-model="form.birth_date"
                                type="date"
                                class="mt-1 block w-full"
                                required
                                autocomplete="birth_date"
                            />
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="grid grid-cols-2 gap-8 items-center justify-end mt-4">
                <JetButton type="button">
                    Help
                </JetButton>

                <JetButton>
                    Account aanmaken
                </JetButton>
            </div>
        </form>
    </div>
</template>
