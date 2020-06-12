<template>
    <div :class="sectionClass">
        <slot />
    </div>
</template>

<script>
export default {
    name: 'OverviewSection',
    props: {
        type: {
            type: String,
            required: true
        },
        size: {
            type: String,
            required: true
        }
    },
    computed: {
        sectionClass() {
            return this.type + '-section p-5 col-sm-' + this.size
        }
    }
}
</script>
