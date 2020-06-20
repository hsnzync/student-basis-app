<template>
    <div class="modal-window row justify-content-center m-0" @click.self="close">
        <div class="col-sm-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>
                        Weet u zeker dat <span class="subject-title">{{ itemTitle }}</span> wilt
                        verwijderen?
                    </h5>
                </div>

                <div class="modal-body">
                    <button type="submit" class="btn btn-danger">
                        Bevestigen
                    </button>
                    <button type="button" class="btn btn-link" @click="$emit('close')">
                        Annuleren
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ModalWindow',
    props: {
        item: {
            type: Object,
            default: () => {},
            required: true
        }
    },
    computed: {
        itemTitle() {
            return this.item?.title || this.item?.first_name + ' ' + this.item?.last_name
        }
    }
}
</script>
