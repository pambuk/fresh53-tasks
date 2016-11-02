// require('./bootstrap');

import Vue from 'vue';
import Counter from './components/Counter.vue';
import store from './store';

const app = new Vue({
    el: '#app',
    store,
    components: {
        Counter
    }
});
