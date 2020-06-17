<template>
    <overview-section :type="type" :size="size">
        <header-section :title="title" />
        <div class="item-search">
            <div class="form-group mb-0 mt-4">
                <i class="fas fa-search"></i>
                <input type="text" v-model="search" class="form-control" placeholder="Zoeken.." />
            </div>
        </div>
        <overview-wrapper v-if="!isLoading">
            <div
                class="items pt-5"
                v-for="(subject, index) in filteredSubjects"
                :key="index"
                @click="handleClick(subject)"
            >
                <div class="item row m-0 p-3" :class="{ open: selected === subject.id }">
                    <div class="item-image col-4 p-0">
                        <v-lazy-image
                            :src="generateThumbnail(subject.image_url)"
                            src-placeholder="https://cdn.dribbble.com/users/358080/screenshots/1986444/loader.gif"
                        />
                    </div>
                    <div class="item-text col-8 row ml-0 py-2">
                        <div>
                            <h4>{{ subject.title }}</h4>
                            <RatingSection :score="4" />
                            <p class="mt-3 mb-0">Frank Stolz</p>
                        </div>
                        <LabelSection :status="'Beschikbaar'" />
                    </div>
                </div>
            </div>
        </overview-wrapper>

        <EmptySubjectPlaceholder v-else :count="6" />
    </overview-section>
</template>

<script>
import VLazyImage from 'v-lazy-image'

import OverviewWrapper from './OverviewWrapper'
import OverviewSection from './OverviewSection'
import HeaderSection from './HeaderSection'
import RatingSection from './RatingSection'
import LabelSection from './LabelSection'
import EmptySubjectPlaceholder from './loaders/EmptySubjectPlaceholder'

export default {
    name: 'Subjects',
    components: {
        VLazyImage,
        OverviewWrapper,
        OverviewSection,
        HeaderSection,
        RatingSection,
        LabelSection,
        EmptySubjectPlaceholder
    },
    inject: ['initialSubject'],
    props: {
        subjects: {
            type: Array,
            required: false
        },
        isLoading: {
            type: Boolean,
            required: false
        }
    },
    created() {
        console.info(this.subjects)
    },
    data() {
        return {
            type: 'subjects',
            title: 'Vakken',
            size: '4',
            selected: this.initialSubject.id,
            search: ''
        }
    },
    computed: {
        filteredSubjects() {
            return this.subjects.filter(subject => {
                return subject.title.toLowerCase().includes(this.search.toLowerCase())
            })
        }
    },
    methods: {
        generateThumbnail(url) {
            if (url) {
                return '/uploads/images/' + url
            }
            return '/uploads/images/fallback/fallback.jpg'
        },
        handleClick(subject) {
            this.selected = subject.id
            this.$emit('showCourse', subject.id)

            this.$store.commit('handleSubject', subject)
        }
    }
}
</script>
