<template>
    <div class="w-[80%] mx-auto sm:ml-0">
        <h2 class="text-7xl text-brand-purple font-lalezar" v-show="status === 'too_old'">Helaas u bent te oud</h2>
        <h2 class="text-7xl text-brand-purple font-lalezar" v-show="status === 'too_young'">Helaas u bent te jong</h2>

        <p class="mt-10">Helaas kunt u niet mee doen aan Transformers Community. De geboorte datum dat u bij ons heeft opgeven valt niet ben de juiste leeftijd categorie.  Voor verder informatie kunt u contact met ons opnemen.</p>

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

                <tr>
                    <td>
                        <p class="font-bold">Geboortedatum</p>
                    </td>

                    <td>
                        {{ birth_date }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="grid grid-cols-2 gap-8 items-center justify-end mt-8">
            <Link :href="route('login')">
                <JetButton type="button">
                    Terug
                </JetButton>
            </Link>

            <JetButton type="button">
                Help
            </JetButton>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import AuthLayout from "../../Layouts/AuthLayout";
import JetButton from "../../Jetstream/Button";

export default {
    name: "WrongAge",
    components: {
        Link,
        JetButton
    },
    layout: AuthLayout,
    props: {
        status: String,
        email: String,
        birth_date: String
    }
}
</script>
