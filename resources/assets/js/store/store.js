import Vue from 'vue';
import Vuex from 'vuex';

import actions from './actions';

Vue.use(Vuex);

// zrobic ladnie, jak tu:
// http://stackoverflow.com/questions/38334910/pre-fetch-data-using-vuex-and-vue-resource

export default new Vuex.Store({
    state: {
        todos: []
    },
    mutations: {
        addTodo: (state, payload) => {
            state.todos.push(payload);
        },
        changeTodoStatus: (state, payload) => {
            state.todos.forEach(todo => {
                if (payload.id === todo.id) {
                    todo.done = !todo.done;
                }
            });
        },
        addTodos: (state, payload) => {
            state.todos = payload;
        }
    },
    getters: {
        completed: state => {
            return state.todos.filter(todo => todo.status);
        },
        completedCount: (state, getters) => {
            return getters.completed.length;
        },
        todos: state => {
            return state.todos;
        }
    },
    actions
});