<template>

    <select name="school_id" class="form-control col-6">
        <option selected="selected" value=""> Kies een school </option>
        <option v-for="schools in name" v-bind:key="schools" value="1">{{ schools }}</option>
    </select>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: ['schools', 'name'],
    }
</script>
