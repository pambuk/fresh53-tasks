<template>
    <div>
        <div class="form-group form-inline">
            <input v-model="newTask.description" placeholder="New Task" style="width: 60%" class="form-control" type="text" />
            <input v-model="newTask.estimated_end" style="width: 175px" class="form-control" type="date" />
            <button class="btn btn-success" @click="add(newTask); newTask = {}">Add</button>
        </div>

        <div class="col-md-12">
            <div class="col-md-6">
                <h4>Pending</h4>
                <ul class="list-unstyled">
                    <li v-for="todo in pending" style="cursor:pointer;">
                        {{ todo.description }} <small style="color: #aaaaaa" v-if="todo.estimated_end">Deadline: {{ todo.estimated_end }}</small>
                        <i @click="changeStatus(todo)" class="fa fa-thumbs-up"></i>
                        <i @click="deleteTodo(todo)" class="fa fa-trash"></i>
                    </li>
                </ul>
            </div>

            <div class="col-md-6">
                <h4>Completed</h4>
                <ul class="list-unstyled">
                    <li v-for="todo in completed" style="cursor:pointer;">
                        {{ todo.description }} <i @click="deleteTodo(todo)" class="fa fa-trash"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';
    import moment from 'moment';

    export default {
        data() {
            return {
                newTask: {
                    estimated_end: moment().format('YYYY-MM-DD')
                }
            };
        },
        computed: {
            pending: self => {
                return _.sortBy(self.$store.getters.pending, ['estimated_end']);
            },
            completed: self => {
                return _.sortBy(self.$store.getters.completed, ['finished']).reverse();
            }
        },
        methods: {
            ...mapActions({
                changeStatus: 'changeTodoStatus',
                add: 'addTodo',
                deleteTodo: 'deleteTodo'
            })
        }
    }
</script>