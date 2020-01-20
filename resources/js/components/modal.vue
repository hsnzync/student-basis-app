<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <p @click="$emit('close')">Sluit</p>
                    <div class="card-header">Example Component</div>

                    <div class="card-body">

                        <form method="POST" action="http://127.0.0.1:8000/admin/user/4" accept-charset="UTF-8">
                            <input name="_token" type="hidden" value="gU20SI1efgPeqoia3WveRotbekhQYDYMtoH0H34E">
                            <input type="hidden" name="_token" value="gU20SI1efgPeqoia3WveRotbekhQYDYMtoH0H34E">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">
                                <i aria-hidden="true" class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Modal',
        data() {
            return {
                showModal: false
            }
        },
        props: ['user'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
