import Vue from 'vue'
import Vuex from 'vuex'
import state from './state'
import mutations from './mutations'
import actions from './actions'
import getters from './getters'
import { SET_INITIAL_SUBJECT, SET_SELECTED_SUBJECT } from './mutation-types'

Vue.use(Vuex)

export default new Vuex.Store({
    namespaces: true,
    state: state,
    mutations: mutations,
    actions: actions,
    getters: getters
    // state: {
    //     activeSubject: undefined
    // },
    // mutations: {
    //     INITIAL_SUBJECT(state, subject) {
    //         state.activeSubject = subject
    //     },
    //     SELECTED_SUBJECT(state, subject) {
    //         state.activeSubject = subject
    //     }
    // },
    // actions: {
    //     initialSubject(context, subject) {
    //         context.commit(SET_INITIAL_SUBJECT, subject)
    //     },
    //     selectedSubject(context, subject) {
    //         context.commit(SET_SELECTED_SUBJECT, subject)
    //     }
    // }
})
