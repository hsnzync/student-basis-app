<template>
    <div class="alert alert-info" role="alert">
        {{ text }}
    </div>
</template>

<script>
export default {
    name: 'StatusBar',
    props: {
        text: {
            type: String,
            default: ''
        }
    }
}
</script>
