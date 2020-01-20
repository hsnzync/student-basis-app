import Vue from 'vue';
import Modal from './components/modal';

new Vue({
    el: '#app',
    components: { Modal },
    data() {
        return {
            showModal: false
        }
    }
})
