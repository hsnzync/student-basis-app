new Vue({
    name: 'school_select',
    el: '#js-school-select',
    data: {
        schools: [],
    },
    mounted: function() 
    {
        this.getProgrammeData();
    },
    components: {
        
    },
    methods: {
        getProgrammeData() {
            console.log('test');
        }
    },
});