<template>
    <standard-wrapper class="row mt-2 mb-4">
        <div class="items placeholder col-md-4 py-3" v-for="(x, index) in count" :key="index">
            <div class="item row col-12 m-0" :style="`background-color:#eee`">
                <div class="item-content col-12 p-4">
                    <div class="placeholder-space"></div>
                    <div class="placeholder-space"></div>
                    <div class="placeholder-space"></div>
                </div>
            </div>
        </div>
    </standard-wrapper>
</template>

<script>
import { StandardWrapper } from '../sections'

export default {
    name: 'EmptyCoursePlaceholder',
    components: { StandardWrapper },
    props: {
        count: {
            type: Number,
            required: false,
            default: 6
        }
    }
}
</script>
