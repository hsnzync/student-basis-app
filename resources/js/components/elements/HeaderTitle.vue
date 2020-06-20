<template>
    <div class="header">
        <h1>{{ title }}</h1>
    </div>
</template>

<script>
export default {
    name: 'HeaderTitle',
    props: {
        title: {
            type: String,
            required: true
        }
    }
}
</script>
