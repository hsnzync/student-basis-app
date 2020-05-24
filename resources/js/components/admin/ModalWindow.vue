<template>
    <div class="modal-window" v-if="showing" @click.self="close">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <span @click="$emit('close')">x</span>
                    <div class="card-header">
                        <p>
                            Weet u zeker dat u dit onderdeel wilt verwijderen?
                        </p>
                    </div>

                    <div class="card-body">
                        <button type="submit" class="btn btn-danger">
                            <i aria-hidden="true" class="fas fa-trash"></i>
                            Bevestigen
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ModalWindow",
    data() {
        return {
            selected: []
        };
    },
    props: {
        showing: {
            required: true,
            type: Boolean
        }
    }
    // computed: {
    //     showModal() {
    //         if (this.isVisible) {
    //             return false;
    //         } else {
    //             return true;
    //         }
    //     }
    // },
    // methods: {
    //     handleModal(key) {
    //         if (this.selected.includes(key)) {
    //             this.selected.splice(-1, key);
    //         } else {
    //             this.selected.push(key);
    //         }
    //     }
    // }
};
</script>
