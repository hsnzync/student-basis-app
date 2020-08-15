<template>
    <div class="item-search">
        <div class="form-group mb-0 mt-4">
            <i class="fas fa-search"></i>
            <input type="text" v-model="search" class="form-control" placeholder="Zoeken.." />
        </div>
    </div>
</template>

<script>
export default {
    name: 'ItemSearchBar',
    data() {
        return {
            search: ''
        }
    },
    watch: {
        search() {
            this.$emit('searchItems', this.search)
        }
    }
}
</script>
