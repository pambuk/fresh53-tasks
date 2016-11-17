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

export const addTodo = (context, todo) => {
    context.state.tasks.errors = [];
    Vue.http.post('/api/tasks', todo).then(
        response => {
            context.commit(types.ADD_TODO, response.data.task);
        },
        response => {
            context.state.tasks.errors = Object
                .keys(response.data)
                .map(key => response.data[key][0]);
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

export const deleteTodo = (context, todo) => {
    Vue.http.delete('/api/tasks/'+todo.id)
        .then(() => {
            context.commit(types.DELETE_TODO, todo);
        }, response => {
// @todo handle
        });
};