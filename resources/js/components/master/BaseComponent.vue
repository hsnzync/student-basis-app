<template>
    <div class="vue-base row m-0">
        <!-- <router-view /> -->
        <Overview />
    </div>
</template>

<script>
import { Overview } from '../pages'
export default {
    name: 'BaseComponent',
    components: { Overview },
    props: {
        initial: {
            type: Object,
            required: false
        }
    },
    provide() {
        return {
            initial: this.initial
        }
    }
}
</script>
