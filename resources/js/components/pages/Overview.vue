<template>
    <div class="overview row m-0">
        <Subjects :subjects="subjects" @showCourse="fetchCourses" :is-loading="isLoading" />
        <Courses :courses="courses" :inital="initial" />
    </div>
</template>

<script>
import axios from 'axios'

import { Subjects, Courses } from '../features'
import { Loader } from '../loaders'

export default {
    name: 'Overview',
    components: { Subjects, Courses, Loader },
    props: {
        initial: {
            type: Object,
            required: false
        }
    },
    data() {
        return {
            subjects: [],
            courses: [],
            limit: 6,
            offset: 6,
            isLoading: false
        }
    },
    provide() {
        return {
            initial: this.initial
        }
    },
    mounted() {
        this.fetchSubjects()
        this.fetchCourses() // fire this initially so first subject courses will be fetched
    },
    methods: {
        fetchSubjects() {
            this.isLoading = true

            axios
                .get('api/load-subjects')
                .then(response => {
                    this.subjects = response.data.subjects
                    this.isLoading = false
                })
                .catch(e => {
                    console.error(e)
                })
        },
        fetchCourses(value) {
            let id = value || 1
            axios
                .get('api/load-courses?subject=' + id)
                .then(response => {
                    this.courses = response.data.courses
                })
                .catch(e => {
                    console.error(e)
                })
        }
    }
}
</script>
