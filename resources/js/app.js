window.Vue = require('vue')
require('./bootstrap')

import 'es6-promise/auto'
import Vuex from 'vuex'

/** COMPONENTS */
Vue.component('Overview', require('./components/Overview.vue').default)
Vue.component('OverviewWrapper', require('./components/OverviewWrapper.vue').default)
Vue.component('OverviewSection', require('./components/OverviewSection.vue').default)
Vue.component('HeaderSection', require('./components/HeaderSection.vue').default)
Vue.component('ActionButton', require('./components/ActionButton.vue').default)
Vue.component('RatingSection', require('./components/RatingSection.vue').default)
Vue.component('LabelSection', require('./components/LabelSection.vue').default)

/** LOADERS */
Vue.component('Loader', require('./components/loaders/Loader.vue').default)
Vue.component(
    'EmptySubjectPlaceholder',
    require('./components/loaders/EmptySubjectPlaceholder.vue').default
)

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        activeSubject: undefined
    },
    mutations: {
        handleSubject(state, payload) {
            state.activeSubject = payload
        }
    }
})

new Vue({
    el: '#app',
    store
}).$mount('#app')
