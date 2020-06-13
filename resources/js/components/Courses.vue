<template>
    <overview-section :type="type" :size="size">
        <title-section :title="initialSubject.title" />
        <overview-wrapper :type="type">
            <div class="courses pt-5" v-for="(course, index) in courses" :key="index">
                <a :href="generateUrl(course.slug)">
                    <div class="course row m-0 p-3">
                        <div class="course-image col-4 p-0">
                            <img src="/uploads/images/fallback/fallback.jpg" :alt="course.title" />
                        </div>
                        <div class="course-text col-8">
                            <h4>{{ course.title }}</h4>
                        </div>
                    </div>
                </a>
            </div>
        </overview-wrapper>
    </overview-section>
</template>

<script>
import OverviewWrapper from './OverviewWrapper'
import OverviewSection from './OverviewSection'
import TitleSection from './TitleSection'

export default {
    name: 'Courses',
    components: { OverviewWrapper, OverviewSection },
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
            size: '7'
        }
    },
    methods: {
        generateUrl(slug) {
            return 'browse/' + slug
        }
    }
}
</script>
