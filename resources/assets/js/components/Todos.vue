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
                    <li @click="changeStatus(todo)" v-for="todo in pending" style="cursor:pointer;">
                        {{ todo.id }}. {{ todo.description }} <small style="color: #aaaaaa" v-if="todo.estimated_end">Deadline: {{ todo.estimated_end }}</small>
                    </li>
                </ul>
            </div>

            <div class="col-md-6">
                <h4>Completed</h4>
                <ul class="list-unstyled">
                    <li @click="changeStatus(todo)" v-for="todo in completed" style="cursor:pointer;">
                        {{ todo.id }}. {{ todo.description }}
                    </li>
                </ul>
            </div>
        </div>
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
                'pending', 'completed'
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