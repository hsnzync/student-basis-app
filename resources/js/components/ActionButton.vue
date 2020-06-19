<template>
    <div>
        <button type="button" class="btn btn-danger" @click="handleModal">
            <i class="fas fa-trash" aria-hidden="true"></i>
        </button>
        <ModalWindow :item="item" v-if="isActive" @close="closeModal" />
    </div>
</template>

<script>
import ModalWindow from './ModalWindow'
export default {
    name: 'ActionButton',
    components: { ModalWindow },
    props: {
        item: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        return {
            isActive: false
        }
    },
    methods: {
        handleModal(value) {
            this.isActive = true
        },
        closeModal() {
            this.isActive = false
        }
    }
}
</script>
