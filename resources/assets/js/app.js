require('./bootstrap');

// import Vue from 'vue';
import VueRouter from 'vue-router';

import Todos from './components/Todos.vue';
import Settings from './components/Settings.vue';
import store from './store-todos';

Vue.use(VueRouter);

const routes = [
    { path: '/tasks', component: Todos },
    { path: '/settings', component: Settings }
];

const router = new VueRouter({routes});

const app = new Vue({
    el: '#app',
    store, router
});
