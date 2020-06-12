<template>
    <overview-section :type="type" :size="size">
        <!-- <div class="col-sm-4 subjects-section p-5"> -->
        <div class="header">
            <h1>Vakken</h1>
        </div>
        <div class="subject-search">
            <div class="form-group mb-0">
                <input type="text" name="search" class="form-control" placeholder="Zoeken.." />
            </div>
        </div>
        <overview-wrapper :type="type">
            <div class="subjects pt-5" v-for="(subject, index) in subjects" :key="index">
                <a :href="generateUrl(subject.slug)">
                    <div class="subject row m-0 p-3">
                        <div class="subject-image col-4 p-0">
                            <img src="/uploads/images/fallback/fallback.jpg" :alt="subject.title" />
                        </div>
                        <div class="subject-text col-8">
                            <h4>{{ subject.title }}</h4>
                            <p>Aangemaakt op: 01-01-2020</p>
                        </div>
                    </div>
                </a>
            </div>
        </overview-wrapper>
        <!-- <div class="col-12 main-features-section-btn">
            <a class="features-btn js-load-subjects" href="#">Load more</a>
        </div> -->
    </overview-section>
</template>

<script>
import OverviewWrapper from './OverviewWrapper'
import OverviewSection from './OverviewSection'

export default {
    name: 'Subjects',
    components: { OverviewWrapper, OverviewSection },
    props: {
        subjects: {
            type: Array,
            required: false
        }
    },
    data() {
        return {
            type: 'subjects',
            size: '4'
        }
    },
    methods: {
        generateUrl(slug) {
            return 'browse/' + slug
        }
    }
}
</script>
