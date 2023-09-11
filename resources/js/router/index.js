import { createWebHistory, createRouter } from "vue-router"

import Home from '../pages/Home.vue'
import Dashboard from '../pages/Dashboard.vue'
import Login from '../pages/Login.vue'
import Registration from '../pages/Registration.vue'

export const routes = [
    {
        name: 'Home',
        path: '/',
        component: Home
    },
    {
        name: 'Dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'Login',
        path: '/login',
        component: Login
    },
    {
        name: 'Registration',
        path: '/registration',
        component: Registration
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
})

export default router;