import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        todos: [
            {id: 1, text: '...', done: true},
            {id: 2, text: '...', done: false},
            {id: 3, text: '...', done: false},
        ]
    },
    mutations: {
        changeTodoStatus: (state, payload) => {
            state.todos.forEach(todo => {
                if (payload.id === todo.id) {
                    todo.done = !todo.done;
                }
            });
        }
    },
    getters: {
        completed: state => {
            return state.todos.filter(todo => todo.done);
        },
        completedCount: (state, getters) => {
            return getters.completed.length;
        },
        todos: state => {
            return state.todos;
        }
    },
    actions: {
    }
});