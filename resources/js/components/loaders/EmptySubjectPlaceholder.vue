<template>
    <standard-wrapper>
        <div class="items placeholder pt-5" v-for="(x, index) in count" :key="index">
            <div class="item row m-0 p-3">
                <div class="item-image col-4 p-0">
                    <img
                        src="https://storage.googleapis.com/htw-website-uploads/Grey-placeholder-image2.jpg"
                    />
                </div>
                <div class="item-text col-8 row ml-0 py-2">
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
    name: 'EmptySubjectPlaceholder',
    components: { StandardWrapper },
    props: {
        count: {
            type: Number,
            required: false
        }
    }
}
</script>
