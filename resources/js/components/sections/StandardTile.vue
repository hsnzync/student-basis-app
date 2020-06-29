<template>
    <div :class="`${this.type}-tile`">
        <slot />
    </div>
</template>

<script>
export default {
    name: 'StandardTile',
    props: {
        type: {
            type: String,
            required: false,
            default: 'subjects'
        }
    }
}
</script>
