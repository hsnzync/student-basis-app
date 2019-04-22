<template>

    <select name="school_id" class="form-control col-6">
        <option selected="selected" value=""> Kies een school </option>
        <option>{{ schoolData }}</option>
    </select>

</template>

<script>
    export default {
        mounted() {
            console.log(this.schoolData);
        },

        props: ['schoolData'],
    }
</script>
