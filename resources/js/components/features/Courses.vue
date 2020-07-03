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
                <standard-tile :type="type">
                    <a :href="generateUrl(course.slug)">
                        <status-label v-if="course.is_completed"
                            ><i class="fas fa-check"></i
                        ></status-label>
                        <div class="item row col-12 m-0" :style="`background-color:${course.hex}`">
                            <div class="item-content col-12 p-4">
                                <h4>{{ course.title }}</h4>
                                <span><i class="fas fa-folder-open pr-2"></i>5 oefeningen</span>
                                <span><i class="fas fa-clock pr-2"></i>30 - 40 min</span>
                            </div>
                        </div>
                    </a>
                </standard-tile>
            </div>
        </standard-wrapper>
        <StatusBar v-else :text="textContent.status.noCoursesAvailable" />
        <!-- <EmptyCoursePlaceholder v-else /> -->
    </overview-section>
</template>

<script>
import { mapState, mapMutations, mapActions } from 'vuex'
import { OverviewSection, StandardWrapper, StandardTile } from '../sections'
import { HeaderTitle, HeaderImage, StatusBar, StatusLabel } from '../elements'
import { EmptyCoursePlaceholder } from '../loaders'

export default {
    name: 'Courses',
    components: {
        StandardWrapper,
        OverviewSection,
        HeaderTitle,
        HeaderImage,
        EmptyCoursePlaceholder,
        StatusBar,
        StatusLabel,
        StandardTile
    },
    inject: ['initial', 'textContent'],
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
