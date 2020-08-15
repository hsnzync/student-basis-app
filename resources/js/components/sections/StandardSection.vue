<template>
    <section :class="sectionClass">
        <slot />
    </section>
</template>

<script>
export default {
    name: 'StandardSection',
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
            return this.type + '-section p-5 col-lg-' + this.size
        }
    }
}
</script>
