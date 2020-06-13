<template>
    <div v-if="!isLoadingSubjects" class="row m-0">
        <Subjects :subjects="subjects" @showCourse="fetchCourses" />
        <Courses :courses="courses" />
    </div>
    <div v-else>
        <!-- <img src="'/svg/loader.svg'" alt="loader" /> -->
        Aan het laden...
    </div>
</template>

<script>
import axios from 'axios'
import Subjects from './Subjects'
import Courses from './Courses'

export default {
    name: 'Overview',
    components: { Subjects, Courses },
    props: {
        initial: {
            type: Number,
            required: false
        }
    },
    data() {
        return {
            subjects: [],
            courses: [],
            limit: 6,
            offset: 6,
            isLoadingSubjects: true,
            isLoadingCourses: false
        }
    },
    provide() {
        return {
            initialSubject: this.initial
        }
    },
    mounted() {
        this.fetchSubjects()
    },
    methods: {
        fetchSubjects() {
            this.isLoadingSubjects = true
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
                    this.isLoadingSubjects = false
                })
                .catch(e => {
                    console.error(e)
                })
        },
        fetchCourses(value) {
            console.info('PARENT: ', value)

            axios
                .get('api/load-courses?subject=' + value)
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
