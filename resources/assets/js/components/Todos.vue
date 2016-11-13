<template>
    <div>
        <p>Completed: {{ completedCount }}</p>
        <ul>
            <li @click="changeStatus(todo)" v-for="todo in todos" style="cursor:pointer;">
                {{ todo.id }} {{ todo.text }} {{ todo.done }}
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {mapActions} from 'vuex';

    export default {
        computed: {
            ...mapGetters([
                'todos',
                'completedCount'
            ])
        },
        methods: {
            ...mapActions({
                changeStatus: 'changeTodoStatus',
            })
        }
    }
</script>