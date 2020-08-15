<template>
    <div class="row m-0">
        <Subjects :subjects="subjects" @showCourse="fetchCourses" :is-loading="isLoading" />
        <Courses :courses="courses" :inital="initial" />
    </div>
</template>

<script>
import axios from 'axios'
// import Lang from 'lang.js'
import { Subjects, Courses } from '../features'
import { Loader } from '../loaders'

export default {
    name: 'Overview',
    components: { Subjects, Courses, Loader },
    inject: ['initial'],
    data() {
        return {
            subjects: [],
            courses: [],
            limit: 6,
            offset: 6,
            isLoading: false,
            initialId: undefined
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
            this.initialId = value || 1
            axios
                .get('api/load-courses?subject=' + this.initialId)
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
