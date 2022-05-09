<template>
    <div class="grid grid-cols-[auto,1fr] overflow-y-hidden">
        <div class="grid grid-rows-2 text-center shadow-2xl h-screen w-24">
            <div class="flex flex-col gap-8 mx-auto">
                <div class="mt-10">
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

        <slot />
    </div>
</template>

<script>
import { MenuIcon } from '@heroicons/vue/outline'
import { UserCircleIcon, CogIcon, HomeIcon, ChatAlt2Icon } from '@heroicons/vue/solid'

export default {
    name: "DashboardLayout",
    components: {
        HomeIcon,
        MenuIcon,
        ChatAlt2Icon,
        UserCircleIcon,
        CogIcon
    }
}
</script>
