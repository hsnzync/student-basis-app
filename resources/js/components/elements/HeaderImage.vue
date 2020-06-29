<template>
    <div class="header-image mb-4">
        <v-lazy-image
            :src="generateThumbnail"
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
    },
    computed: {
        generateThumbnail() {
            if (this.image) {
                return '/uploads/images/' + this.image
            }
            return '/uploads/images/fallback/fallback.jpg'
        }
    }
}
</script>
