window.Vue = require('vue')

/** COMPONENTS */
Vue.component('CardBlocks', require('./components/CardBlocks.vue').default)
Vue.component('ModalWindow', require('./components/ModalWindow.vue').default)

require('./bootstrap')

new Vue({
    el: '#app'
}).$mount('#app')
