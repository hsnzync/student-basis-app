<template>
    <overview-section :type="type" :size="size">
        <header-section :title="subjectTitle" />
        <overview-wrapper v-if="courses.length > 0">
            <div class="items pt-5" v-for="(course, index) in courses" :key="index">
                <a :href="generateUrl(course.slug)">
                    <div class="item row m-0 p-3">
                        <div class="item-image col-4 p-0">
                            <img src="/uploads/images/fallback/fallback.jpg" :alt="course.title" />
                        </div>
                        <div class="item-text col-8">
                            <h4>{{ course.title }}</h4>
                        </div>
                    </div>
                </a>
            </div>
        </overview-wrapper>
        <p v-else>Geen cursussen gevonden</p>
    </overview-section>
</template>

<script>
import OverviewWrapper from './OverviewWrapper'
import OverviewSection from './OverviewSection'
import HeaderSection from './HeaderSection'

export default {
    name: 'Courses',
    components: { OverviewWrapper, OverviewSection, HeaderSection },
    inject: ['initialSubject'],
    props: {
        courses: {
            type: Array,
            required: false
        }
    },
    data() {
        return {
            type: 'courses',
            size: '8',
            title: this.initialSubject.title
        }
    },
    computed: {
        subjectTitle() {
            if (this.$store.state.activeSubject) {
                return this.$store.state.activeSubject?.title
            }

            return this.title
        }
    },
    methods: {
        generateUrl(slug) {
            return 'browse/' + slug
        }
    }
}
</script>
