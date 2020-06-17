<template>
    <div class="label-section">
        <span class="badge p-2" :class="labelClass">{{ labelValue }}</span>
    </div>
</template>

<script>
import { AVAILABLE, IN_PROGRESS, DONE } from '../constants/labels'

export default {
    name: 'LabelSection',
    props: {
        status: {
            type: String,
            required: false
        }
    },
    computed: {
        labelClass() {
            if (this.status === AVAILABLE) {
                return 'badge-light'
            } else if (this.status === IN_PROGRESS) {
                return 'badge-warning'
            } else if (this.status === DONE) {
                return 'badge-success'
            }

            return 'badge-light'
        },
        labelValue() {
            if (this.status === AVAILABLE) {
                return AVAILABLE
            } else if (this.status === IN_PROGRESS) {
                return IN_PROGRESS
            } else if (this.status === DONE) {
                return DONE
            }

            return AVAILABLE
        }
    }
}
</script>
