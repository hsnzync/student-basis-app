new Vue({
    name: 'school_select',
    el: '#js-school_select',
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