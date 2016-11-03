import Vue from 'vue';
import Todos from './components/Todos.vue';
import store from './store-todos';

const app = new Vue({
    el: '#app',
    store,
    components: {
        Todos
    }
});
