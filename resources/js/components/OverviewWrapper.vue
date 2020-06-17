<template>
    <div :class="wrapperClass">
        <slot />
    </div>
</template>

<script>
export default {
    name: 'OverviewWrapper',
    props: {
        type: {
            type: String,
            required: false,
            default: 'items'
        }
    },
    computed: {
        wrapperClass() {
            return this.type + '-wrapper'
        }
    }
}
</script>
