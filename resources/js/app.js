window.Vue = require('vue')

/** COMPONENTS */
Vue.component('Overview', require('./components/Overview.vue').default)
Vue.component('OverviewWrapper', require('./components/OverviewWrapper.vue').default)
Vue.component('OverviewSection', require('./components/OverviewSection.vue').default)
Vue.component('TitleSection', require('./components/TitleSection.vue').default)
Vue.component('ModalWindow', require('./components/ModalWindow.vue').default)

require('./bootstrap')

new Vue({
    el: '#app'
}).$mount('#app')
