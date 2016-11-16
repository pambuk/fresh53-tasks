import Vue from 'vue';
import * as types from './mutation-types';

export const changeTodoStatus = ({commit}, todo) => {
    todo.status = !todo.status;

    Vue.http.put('/api/tasks/' + todo.id, {params: {todo: todo}}).then(
        response => {
            commit(types.CHANGE_TODO_STATUS, response.data.task);
        },
        () => {
            todo.status = !todo.status;
        }
    );
};

export const addTodo = ({commit}, todo) => {
    Vue.http.post('/api/tasks', todo).then(
        response => {
            commit(types.ADD_TODO, response.data.task);
        },
        response => {
// @todo handle this
        }
    );
};

export const loadTodos = ({commit}) => {
    Vue.http.get('/api/tasks').then(
        (response) => {
            commit(types.ADD_TODOS, response.data);
        }
    );
};

export const deleteTodo = ({commit}, todo) => {
    Vue.http.delete('/api/tasks/'+todo.id)
        .then(() => {
            commit(types.DELETE_TODO, todo);
        }, response => {
// @todo handle
        });
};