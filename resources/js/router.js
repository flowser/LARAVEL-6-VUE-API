import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Home from './pages/front/landingpage.vue';
//backend
//dashboard
import ClientDashboard from './pages/back/client/clientdashboard.vue';
import SuperadminDashboard from './pages/back/superadmin/superadmindashboard.vue';
import AdminDashboard from './pages/back/admin/admindashboard.vue';


let routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/client/dashboard',
        name: 'ClientDashboard',
        component: ClientDashboard,
    },
    {
        path: '/admin/dashboard',
        name: 'AdminDashboard',
        component: AdminDashboard,
    },
    {
        path: '/superadmin/dashboard',
        name: 'SuperadminDashboard',
        component: SuperadminDashboard,
    },
];

export default new VueRouter({
    mode: 'history',
    routes
});
