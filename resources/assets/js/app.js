require('./bootstrap');

import VueRouter from 'vue-router';

import App from './components/App.vue';
import Todos from './components/Todos.vue';
import Settings from './components/Settings.vue';

import store from './store-todos';

Vue.use(VueRouter);

const Welcome = {template: '<div>You are logged in!</div>'};

const routes = [
    {path: '/', component: Welcome, meta: {breadcrumb: 'Dashboard'}},
    {path: '/tasks', component: Todos, meta: {breadcrumb: 'Tasks'}},
    {path: '/settings', component: Settings, meta: {breadcrumb: 'Settings'}}
];

const router = new VueRouter({routes});

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    store, router
});
