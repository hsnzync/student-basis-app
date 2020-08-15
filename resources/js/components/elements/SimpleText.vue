<template>
    <p>{{ text }}</p>
</template>

<script>
export default {
    name: 'SimpleText',
    props: {
        text: {
            type: String,
            required: false
        }
    }
}
</script>
