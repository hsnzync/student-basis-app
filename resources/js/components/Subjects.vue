<template>
    <overview-section :type="type" :size="size">
        <!-- <div class="col-sm-4 subjects-section p-5"> -->
        <title-section :title="title" />
        <div class="subject-search">
            <div class="form-group mb-0">
                <input type="text" name="search" class="form-control" placeholder="Zoeken.." />
            </div>
        </div>
        <overview-wrapper :type="type">
            <div
                class="subjects pt-5"
                v-for="(subject, index) in subjects"
                :key="index"
                @click="handleClick(subject.id)"
            >
                <div class="subject row m-0 p-3" :class="{ open: selected === subject.id }">
                    <div class="subject-image col-4 p-0">
                        <img :src="generateThumbnail(subject.image_url)" :alt="subject.title" />
                    </div>
                    <div class="subject-text col-8">
                        <h4>{{ subject.title }}</h4>
                        <p>Aangemaakt op: 01-01-2020</p>
                    </div>
                </div>
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
import TitleSection from './TitleSection'

export default {
    name: 'Subjects',
    components: { OverviewWrapper, OverviewSection, TitleSection },
    inject: ['initialSubject'],
    props: {
        subjects: {
            type: Array,
            required: false
        }
    },
    data() {
        return {
            type: 'subjects',
            title: 'Vakken',
            size: '4',
            selected: this.initialSubject.id
        }
    },
    methods: {
        generateThumbnail(url) {
            if (url) {
                return '/uploads/images/' + url
            }
            return '/uploads/images/fallback/fallback.jpg'
        },
        handleClick(id) {
            this.selected = id
            this.$emit('showCourse', id)
        }
    }
}
</script>
