<template>
    <div class="header-image mb-4">
        <v-lazy-image
            :src="image"
            src-placeholder="https://cdn.dribbble.com/users/358080/screenshots/1986444/loader.gif"
        />
    </div>
</template>

<script>
import VLazyImage from 'v-lazy-image'

export default {
    name: 'HeaderImage',
    components: { VLazyImage },
    props: {
        image: {
            type: String,
            required: true,
            default: null
        }
    }
}
</script>
