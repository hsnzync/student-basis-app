<template>
    <div v-if="!isLoading" class="col-12 row">
        <div class="card-wrapper col-md-4" v-for="(subject, index) in subjects" :key="index">
            <a :href="generateCourseUrl(subject.slug)" class="browse-item">
                <div class="card-section">
                    <div class="card-image">
                        <img src="/uploads/images/fallback/fallback.jpg" alt="test" />
                    </div>
                    <div class="card-text">
                        <h4>{{ subject.title }}</h4>
                        <p>Aangemaakt op: 01-01-2020</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div v-else>
        <!-- <img src="'/svg/loader.svg'" alt="loader" /> -->
        Aan het laden...
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'CardBlocks',
    data() {
        return {
            subjects: [],
            limit: 6,
            offset: 6,
            isLoading: true
        }
    },
    mounted() {
        this.fetchSubjects()
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
        generateCourseUrl(slug) {
            return 'browse/' + slug
        }
    }
}
</script>
