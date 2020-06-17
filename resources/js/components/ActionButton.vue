<template>
    <button type="button" class="btn btn-danger" @click="handleModal" v-if="!isClicked">
        <i class="fas fa-trash" aria-hidden="true"></i>
    </button>
    <button type="submit" class="btn btn-danger" v-else>
        Bevestig
    </button>
</template>

<script>
export default {
    name: 'ActionButton',
    props: {
        item: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        return {
            isClicked: false
        }
    },
    methods: {
        handleModal(value) {
            this.isClicked = true
        }
    }
}
</script>
