<template>
    <div class="overview row m-0">
        <Subjects :subjects="subjects" @showCourse="fetchCourses" :is-loading="isLoading" />
        <Courses :courses="courses" />
    </div>
    <!-- <Loader v-else /> -->
</template>

<script>
import axios from 'axios'
import Subjects from './Subjects'
import Courses from './Courses'
import Loader from './loaders/Loader'

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
            initialSubject: this.initial
        }
    },
    mounted() {
        this.fetchSubjects()
        this.fetchCourses() // fire this initially so first subject courses will be fetched
    },
    methods: {
        fetchSubjects() {
            this.isLoading = true
            let url = new URL(window.location.href)
            let id_param = url.searchParams.get('id')

            axios
                .get(
                    'api/load-subjects?limit=' +
                        this.limit +
                        '&offset=' +
                        this.offset +
                        '&id=' +
                        id_param
                )
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
