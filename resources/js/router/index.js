import Vue from 'vue'
import VueRouter from 'vue-router'
import { Overview, MyProfile } from '../components/pages'

Vue.use(VueRouter)

const routes = [
    {
        path: '/browse',
        name: 'Overview',
        component: Overview
    },
    {
        path: '/my-profile',
        name: 'About',
        component: MyProfile
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        // component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
