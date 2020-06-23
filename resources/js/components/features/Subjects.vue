<template>
    <overview-section :type="type" :size="size">
        <HeaderTitle :title="title" />
        <div class="item-search">
            <div class="form-group mb-0 mt-4">
                <i class="fas fa-search"></i>
                <input type="text" v-model="search" class="form-control" placeholder="Zoeken.." />
            </div>
        </div>
        <ItemFilter />
        <standard-wrapper v-if="!isLoading">
            <div
                class="items pt-4"
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
                    <div class="item-content col-8 row ml-0 py-2">
                        <div>
                            <h4>{{ subject.title }}</h4>
                            <Rating :score="4" />
                            <Participants />
                        </div>
                        <LabelBadge :status="'Beschikbaar'" />
                    </div>
                </div>
            </div>
        </standard-wrapper>

        <EmptySubjectPlaceholder v-else :count="6" />
    </overview-section>
</template>

<script>
import VLazyImage from 'v-lazy-image'
import { mapState, mapMutations, mapActions } from 'vuex'

import { StandardWrapper, OverviewSection } from '../sections'
import { Rating, LabelBadge, HeaderTitle, Participants, ItemFilter } from '../elements'
import { EmptySubjectPlaceholder } from '../loaders'

export default {
    name: 'Subjects',
    components: {
        VLazyImage,
        StandardWrapper,
        OverviewSection,
        Rating,
        LabelBadge,
        HeaderTitle,
        Participants,
        ItemFilter,
        EmptySubjectPlaceholder
    },
    inject: ['initial'],
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
    data() {
        return {
            type: 'subjects',
            title: 'Vakken',
            size: '4',
            selected: this.initial.id,
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
        ...mapMutations(['SELECTED_SUBJECT']),
        ...mapActions(['selectedSubject']),
        generateThumbnail(url) {
            if (url) {
                return '/uploads/images/' + url
            }
            return '/uploads/images/fallback/fallback.jpg'
        },
        handleClick(subject) {
            this.selected = subject.id
            this.$emit('showCourse', subject.id)
            this.selectedSubject(subject)
        }
    }
}
</script>