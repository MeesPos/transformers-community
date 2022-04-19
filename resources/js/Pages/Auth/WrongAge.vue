<template>
    <div class="w-[80%] mx-auto sm:ml-0">
        <h2 class="text-5xl text-brand-purple font-lalezar">Helaas kan je je nu niet aanmelden. </h2>

        <p class="mt-10">De community is bedoelt voor jongeren tussen de 16 tot en met 27 jaar. Dit maakt dat jij je op dit moment helaas niet kan aanmelden. We houden bij hoeveel mensen buiten de leeftijdscategorie zich aanmelden. Op het moment dat we deze kunnen uitbreiden, zullen we je hiervan per mail op de hoogte stellen.</p>

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

        <div class="grid grid-cols-3 gap-8 items-center justify-end mt-8">
            <Link :href="route('register')">
                <JetButton type="button">
                    Terug
                </JetButton>
            </Link>

            <JetButton type="button">
                Help
            </JetButton>

            <JetButton type="button">
                Andere Hulporganisatie
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
