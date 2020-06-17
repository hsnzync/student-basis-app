<template>
    <div class="modal-window">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <span>Sluiten</span>
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
    name: 'ModalWindow',
    data() {},
    props: {}
}
</script>
