window.Vue = require('vue')
require('./bootstrap')

import 'es6-promise/auto'
import store from './store/index'

/** COMPONENTS */
Vue.component('Overview', require('./components/pages/Overview.vue').default)
// Vue.component('OverviewWrapper', require('./components/OverviewWrapper.vue').default)
// Vue.component('OverviewSection', require('./components/OverviewSection.vue').default)

/** ELEMENTS */
// Vue.component('Rating', require('./components/elements/Rating.vue').default)
// Vue.component('LabelBadge', require('./components/elements/LabelBadge.vue').default)
// Vue.component('HeaderTitle', require('./components/elements/HeaderTitle.vue').default)
Vue.component('ActionsButton', require('./components/elements/ActionsButton.vue').default)

/** FEATURES */

/** LOADERS */
Vue.component('Loader', require('./components/loaders/Loader.vue').default)
Vue.component(
    'EmptySubjectPlaceholder',
    require('./components/loaders/EmptySubjectPlaceholder.vue').default
)

new Vue({
    el: '#app',
    store
}).$mount('#app')
