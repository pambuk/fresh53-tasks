window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

import Vue from 'vue';
import VueResource from 'vue-resource';
import VueRouter from 'vue-router';
import App from './components/App.vue';
import Todos from './components/Todos.vue';
import Settings from './components/Settings.vue';
import store from './store';

Vue.use(VueResource);
Vue.use(VueRouter);
Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    request.headers.set('Authorization', 'Bearer ' + Laravel.apiToken);
    next();
});

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
