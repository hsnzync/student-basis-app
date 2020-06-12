<template>
    <div v-if="!isLoadingSubjects" class="row m-0">
        <Subjects :subjects="subjects" />
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
        }
    }
}
</script>
