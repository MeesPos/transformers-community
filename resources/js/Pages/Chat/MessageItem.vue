<template>
    <div>
        {{ message.user.username }}: {{ message.message }}
    </div>
</template>

<script>
export default {
    name: "Container",
    props: {
        message: {
            required: true
        }
    }
}
</script>
