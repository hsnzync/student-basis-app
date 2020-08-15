<template>
    <standard-section :type="type" :size="size">
        <header-title :title="textContent.page.title.subjects" />
        <item-search-bar @searchItems="searchSubjects" />
        <item-filter @filterItems="filterSubjects" />
        <standard-wrapper v-if="!isLoading">
            <div
                class="items pt-4"
                v-for="(subject, index) in searchedSubjects"
                :key="index"
                @click="handleClick(subject)"
            >
                <standard-tile :type="type">
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
                                <rating :score="4" />
                                <participants />
                            </div>
                            <label-badge :status="subject.status" />
                        </div>
                    </div>
                </standard-tile>
            </div>
        </standard-wrapper>

        <empty-subject-placeholder v-else />
    </standard-section>
</template>

<script>
import VLazyImage from 'v-lazy-image'
import { mapState, mapMutations, mapActions } from 'vuex'

import { StandardWrapper, StandardSection, StandardTile } from '../sections'
import {
    Rating,
    LabelBadge,
    HeaderTitle,
    Participants,
    ItemFilter,
    ItemSearchBar
} from '../elements'
import { EmptySubjectPlaceholder } from '../loaders'

export default {
    name: 'Subjects',
    components: {
        VLazyImage,
        StandardWrapper,
        StandardSection,
        StandardTile,
        Rating,
        LabelBadge,
        HeaderTitle,
        Participants,
        ItemFilter,
        ItemSearchBar,
        EmptySubjectPlaceholder
    },
    inject: ['initial', 'textContent'],
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
            size: '4',
            selected: this.initial.id,
            search: '',
            activeStatus: ''
        }
    },
    computed: {
        searchedSubjects() {
            return this.subjects.filter(subject => {
                if (this.search) {
                    return subject.title.toLowerCase().includes(this.search.toLowerCase())
                }
                return subject.status.includes(this.activeStatus)
            })
        }
    },
    methods: {
        ...mapMutations(['SELECTED_SUBJECT']),
        ...mapActions(['selectedSubject']),
        generateThumbnail(url) {
            if (url) {
                return `/uploads/images/${url}`
            }
            return '/uploads/images/fallback/fallback.jpg'
        },
        handleClick(subject) {
            this.selected = subject.id
            this.$emit('showCourse', subject.id)
            this.selectedSubject(subject)
        },
        filterSubjects(status) {
            this.activeStatus = status
        },
        searchSubjects(value) {
            this.search = value
        }
    }
}
</script>
