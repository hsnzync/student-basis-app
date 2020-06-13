<template>
    <div class="header">
        <h1>{{ title }}</h1>
    </div>
</template>

<script>
export default {
    name: 'TitleSection',
    props: {
        title: {
            type: String,
            required: true
        }
    }
}
</script>
