import { SET_INITIAL_SUBJECT, SET_SELECTED_SUBJECT } from './mutation-types'

const actions = {
    initialSubject(context, subject) {
        context.commit(SET_INITIAL_SUBJECT, subject)
    },
    selectedSubject(context, subject) {
        context.commit(SET_SELECTED_SUBJECT, subject)
    }
}

export default actions
