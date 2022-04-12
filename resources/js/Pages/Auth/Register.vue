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
    <div class="w-[80%]">
        <h2 class="text-4xl">Aanmelden</h2>

        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non</p>

        <form @submit.prevent="submit">
            <div>
                <JetLabel for="username" value="Username"/>
                <JetInput
                    id="username"
                    v-model="form.username"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />
            </div>

            <div class="mt-4">
                <JetLabel for="email" value="Email"/>
                <JetInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="password" value="Password"/>
                <JetInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <JetLabel for="password_confirmation" value="Confirm Password"/>
                <JetInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <JetLabel for="birth_date" value="Birth date"/>
                <JetInput
                    id="birth_date"
                    v-model="form.birth_date"
                    type="date"
                    class="mt-1 block w-full"
                    required
                    autocomplete="birth_date"
                />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <JetLabel for="terms">
                    <div class="flex items-center">
                        <JetCheckbox id="terms" v-model:checked="form.terms" name="terms"/>

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')"
                                              class="underline text-sm text-gray-600 hover:text-gray-900">Terms of
                            Service</a> and <a target="_blank" :href="route('policy.show')"
                                               class="underline text-sm text-gray-600 hover:text-gray-900">Privacy
                            Policy</a>
                        </div>
                    </div>
                </JetLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link>

                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </JetButton>
            </div>
        </form>
    </div>
</template>
