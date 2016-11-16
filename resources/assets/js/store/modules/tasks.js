import * as types from '../mutation-types';

const state = {
    list: []
};

const getters = {
    completed: state => {
        return state.list.filter(todo => todo.status);
    },

    pending: state => {
        return state.list.filter(todo => !todo.status);
    },

    completedCount: (state, getters) => {
        return getters.completed.length;
    },

    totalCount: state => {
        return state.list.length;
    }
};

const mutations =
{
    [types.ADD_TODO](state, payload) {
        state.list.push(payload);
    },

    [types.CHANGE_TODO_STATUS](state, payload)
    {
        state.list.forEach(todo => {
            if (payload.id === todo.id) {
                todo.done = !todo.done;

                if (todo.done) {
                    todo.finished = payload.finished;
                }
            }
        });
    },

    [types.ADD_TODOS](state, payload)
    {
        state.list = payload;
    }
};

export default {
    state,
    getters,
    mutations
}