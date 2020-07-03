<template>
    <div class="filter-section py-4">
        <ul class="p-0 m-0 row">
            <li class="filter-icon col-1 p-0"><i class="fas fa-sliders-h"></i></li>
            <li
                class="col-2"
                :class="{ 'is-active': activeStatus == '' }"
                @click="handleFilter('')"
            >
                {{ textContent.filter.all }}
            </li>
            <li
                class="col-4"
                :class="{ 'is-active': activeStatus == 'Beschikbaar' }"
                @click="handleFilter('Beschikbaar')"
            >
                {{ textContent.filter.available }}
            </li>
            <li
                class="col-2"
                :class="{ 'is-active': activeStatus == 'Bezig' }"
                @click="handleFilter('Bezig')"
            >
                {{ textContent.filter.inProgress }}
            </li>
            <li
                class="col-3"
                :class="{ 'is-active': activeStatus == 'Voltooid' }"
                @click="handleFilter('Voltooid')"
            >
                {{ textContent.filter.done }}
            </li>
        </ul>
    </div>
</template>

<script>
import { AVAILABLE, IN_PROGRESS, DONE } from '../../constants/labels'

export default {
    name: 'ItemFilter',
    data() {
        return {
            activeStatus: ''
        }
    },
    inject: ['textContent'],
    methods: {
        handleFilter(status) {
            this.activeStatus = status
            this.$emit('filterItems', this.activeStatus)
        }
    }
}
</script>
