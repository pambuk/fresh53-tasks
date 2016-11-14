<template>
    <div>

        <div>
            <input type="text" v-model="newTask.description" />
            <input type="date" v-model="newTask.estimated_end" />
            <button @click="add(newTask)">Add</button>
        </div>

        <p>Completed: {{ completedCount }}</p>
        <ul>
            <li @click="changeStatus(todo)" v-for="todo in todos" style="cursor:pointer;">
                {{ todo.id }} {{ todo.description }} {{ todo.status ? 'Completed' : 'In progress' }}
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';

    export default {
        data() {
            return {
                newTask: {}
            };
        },
        computed: {
            ...mapGetters([
                'todos',
                'completedCount'
            ])
        },
        methods: {
            ...mapActions({
                changeStatus: 'changeTodoStatus',
                add: 'addTodo'
            })
        }
    }
</script>