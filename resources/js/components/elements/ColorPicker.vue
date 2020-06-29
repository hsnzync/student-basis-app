<template>
    <div>
        <span>Achtergrondkleur</span>
        <div class="hex my-3" :style="{ background: colors.hex }" @click="toggle"></div>
        <input type="hidden" :value="colors.hex" name="hex" />
        <Compact v-model="colors" @input="updatedValue" v-show="isActive" />
    </div>
</template>

<script>
import { Compact } from 'vue-color'

export default {
    name: 'ColorPickers',
    components: { Compact },
    data() {
        return {
            colors: {
                hex: '#eee',
                source: 'hex',
                initial: '#eee'
            },
            updatedValue: '',
            isActive: false
        }
    },
    methods: {
        toggle() {
            this.isActive = !this.isActive
        }
    }
}
</script>

<style></style>
