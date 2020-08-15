<template>
    <div class="header-title">
        <h1 :class="{ 'text-primary': color }">
            {{ title }}
            <slot />
        </h1>
        <p v-if="description">{{ description }}</p>
    </div>
</template>

<script>
export default {
    name: 'HeaderTitle',
    props: {
        title: {
            type: String,
            required: true
        },
        description: {
            type: String,
            required: false
        },
        color: {
            type: Boolean,
            required: false
        }
    }
}
</script>
