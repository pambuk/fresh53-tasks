import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

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
    actions: {
        changeTodoStatus({commit}, todo) {
            todo.status = !todo.status;

            // update status on server
            Vue.http.put('/api/tasks/' + todo.id, {params: {todo: todo}}).then(
                response => {
                    commit('changeTodoStatus', response.data.task);
                },
                () => {
                    todo.status = !todo.status;
                }
            );
        },
        addTodo({commit}, todo) {
            Vue.http.post('/api/tasks', todo).then(
                response => {
                    commit('addTodo', response.data.task);
                },
                response => {

                }
            );
        },
        loadTodos({commit}) {
            Vue.http.get('/api/tasks').then(
                (response) => {
                    commit('addTodos', response.data);
                }
            );
        }
    }
});