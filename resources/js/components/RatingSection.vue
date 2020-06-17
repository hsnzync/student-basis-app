<template>
    <div class="rating-section">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
    </div>
</template>

<script>
export default {
    name: 'RatingSection',
    props: {
        score: {
            type: Number,
            required: false
        }
    }
}
</script>
