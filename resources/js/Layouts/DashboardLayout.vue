<template>
    <div class="grid grid-cols-[auto,1fr] overflow-y-hidden relative">
        <div class="grid grid-rows-2 text-center shadow-2xl h-screen w-24"
             v-show="expand === false"
        >
            <div class="flex flex-col gap-8 mx-auto">
                <div class="mt-10"
                     @click="expand = true"
                >
                    <MenuIcon class="h-auto w-8" />
                </div>

                <div class="mt-6">
                    <HomeIcon class="h-auto w-8 text-brand-orange" />
                </div>

                <div>
                    <ChatAlt2Icon class="h-auto w-8 text-brand-orange" />
                </div>

                <div>
                    <UserCircleIcon class="h-auto w-8 text-brand-orange" />
                </div>
            </div>

            <div class="self-end flex flex-col mx-auto gap-8 text-center mb-8">
                <div class="mx-auto">
                    <CogIcon class="h-auto w-8 text-brand-orange" />
                </div>

                <span class="border border-brand-purple px-6" />

                <div>
                    <img class="w-12 h-12 rounded-full"
                         :src="$page.props.user.profile_photo_url"
                         :alt="$page.props.user.username"
                    />
                </div>
            </div>
        </div>

        <div class="grid grid-rows-2 text-center shadow-2xl h-screen w-96 z-50 bg-white"
             v-show="expand === true"
        >
            <div class="flex flex-col gap-8 ml-8">
                <div class="mt-10"
                     @click="expand = false"
                >
                    <XIcon class="h-auto w-8" />
                </div>

                <div class="mt-6 flex flex-row gap-6 items-center">
                    <HomeIcon class="h-auto w-8 text-brand-orange" />

                    <h2 class="text-lg">Home</h2>
                </div>

                <div class="flex flex-row gap-6 items-center">
                    <ChatAlt2Icon class="h-auto w-8 text-brand-orange" />

                    <h2 class="text-lg">Berichten</h2>
                </div>

                <div class="flex flex-row gap-6 items-center">
                    <UserCircleIcon class="h-auto w-8 text-brand-orange" />

                    <h2 class="text-lg">Account</h2>
                </div>
            </div>

            <div class="self-end flex flex-col gap-8 mb-8 ml-8">
                <div class="flex flex-row gap-6 items-center">
                    <CogIcon class="h-auto w-8 text-brand-orange" />

                    <h2 class="text-lg">Instellingen</h2>
                </div>

                <span class="border border-brand-purple px-6 w-12" />

                <div class="flex flex-row gap-6 items-center">
                    <img class="w-12 h-12 rounded-full"
                         :src="$page.props.user.profile_photo_url"
                         :alt="$page.props.user.username"
                    />

                    <h2 class="text-lg"
                        v-text="$page.props.user.username"
                    />
                </div>
            </div>
        </div>

        <div class="absolute left-0 right-0 bg-gray-50 opacity-25 w-screen h-screen z-10"
             v-show="expand === true"
        />

        <slot />
    </div>
</template>

<script>
import { MenuIcon, XIcon } from '@heroicons/vue/outline'
import { UserCircleIcon, CogIcon, HomeIcon, ChatAlt2Icon } from '@heroicons/vue/solid'

export default {
    name: "DashboardLayout",
    data() {
        return {
            expand: false
        }
    },
    components: {
        HomeIcon,
        MenuIcon,
        ChatAlt2Icon,
        UserCircleIcon,
        CogIcon,
        XIcon
    }
}
</script>
