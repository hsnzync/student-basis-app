<template>
    <overview-section :type="type" :size="size">
        <HeaderTitle title="Cursussen" :description="activeSubject.title" />
        <HeaderImage :image="activeSubject.image_url" />
        <HeaderTitle title="Overzicht" />
        <standard-wrapper v-if="courses.length > 0" class="row mt-2 mb-4">
            <div
                class="items col-md-4 py-3"
                :class="setAvailability(course)"
                v-for="(course, index) in courses"
                :key="index"
            >
                <a :href="generateUrl(course.slug)">
                    <div class="item row col-12 m-0" :style="`background-color:${course.hex}`">
                        <div class="item-content col-12 p-4">
                            <h4>{{ course.title }}</h4>
                            <span><i class="fas fa-folder-open pr-2"></i>5 oefeningen</span>
                            <span><i class="fas fa-clock pr-2"></i>30 - 40 min</span>
                        </div>
                    </div>
                </a>
            </div>
        </standard-wrapper>
        <StatusBar v-else text="Geen cursussen beschikbaar." />
        <!-- <EmptyCoursePlaceholder v-else /> -->
    </overview-section>
</template>

<script>
import { mapState, mapMutations, mapActions } from 'vuex'
import { OverviewSection, StandardWrapper } from '../sections'
import { HeaderTitle, HeaderImage, StatusBar } from '../elements'
import { EmptyCoursePlaceholder } from '../loaders'

export default {
    name: 'Courses',
    components: {
        StandardWrapper,
        OverviewSection,
        HeaderTitle,
        HeaderImage,
        EmptyCoursePlaceholder,
        StatusBar
    },
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
        },
        setAvailability(course) {
            // if (!course.is_unlocked) {
            //     return 'locked'
            // }

            return 'unlocked'
        }
    }
}
</script>
