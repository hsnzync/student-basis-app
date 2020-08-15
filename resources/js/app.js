window.Vue = require('vue')
require('./bootstrap')

import 'es6-promise/auto'
import store from './store/index'
import router from './router'

/** Master */
Vue.component('BaseComponent', require('./components/master/BaseComponent.vue').default)
Vue.component('Overview', require('./components/pages/Overview.vue').default)
Vue.component('Dashboard', require('./components/pages/Dashboard.vue').default)

/** ELEMENTS */
Vue.component('ActionsButton', require('./components/elements/ActionsButton.vue').default)
Vue.component('ColorPicker', require('./components/elements/ColorPicker.vue').default)

/** FEATURES */
Vue.component('NavigationItems', require('./components/features/NavigationItems.vue').default)

/** LOADERS */
Vue.component('Loader', require('./components/loaders/Loader.vue').default)
Vue.component(
  'EmptySubjectPlaceholder',
  require('./components/loaders/EmptySubjectPlaceholder.vue').default
)

new Vue({
  el: '#app',
  router,
  store
}).$mount('#app')
