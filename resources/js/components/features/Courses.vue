<template>
    <overview-section :type="type" :size="size">
        <HeaderTitle :title="activeSubject.title" />
        <standard-wrapper v-if="courses.length > 0">
            <div class="items pt-5" v-for="(course, index) in courses" :key="index">
                <a :href="generateUrl(course.slug)">
                    <div class="item row m-0 p-3">
                        <div class="item-image col-4 p-0">
                            <!-- <img src="/uploads/images/fallback/fallback.jpg" :alt="course.title" /> -->
                            <img :src="generateThumbnail(course.image_url)" />
                        </div>
                        <div class="item-text col-8">
                            <h4>{{ course.title }}</h4>
                        </div>
                    </div>
                </a>
            </div>
        </standard-wrapper>
        <p v-else>Geen cursussen gevonden</p>
    </overview-section>
</template>

<script>
import { mapState, mapMutations, mapActions } from 'vuex'
import { OverviewSection, StandardWrapper } from '../sections'
import { HeaderTitle } from '../elements'

export default {
    name: 'Courses',
    components: { StandardWrapper, OverviewSection, HeaderTitle },
    inject: ['initial'],
    props: {
        courses: {
            type: Array,
            required: false
        }
    },
    data() {
        return {
            type: 'courses',
            size: '8'
        }
    },
    created() {
        this.initialSubject(this.initial)
    },
    computed: {
        ...mapState(['activeSubject'])

        // subjectTitle() {
        //     if (this.$store.state.activeSubject) {
        //         return this.$store.state.activeSubject?.title
        //     }

        //     return this.title
        // }
    },
    methods: {
        ...mapMutations(['INITIAL_SUBJECT']),
        ...mapActions(['initialSubject']),

        generateThumbnail(url) {
            if (url) {
                return '/uploads/images/' + url
            }
            return '/uploads/images/fallback/fallback.jpg'
        },
        generateUrl(slug) {
            return 'browse/' + slug
        }
    }
}
</script>
