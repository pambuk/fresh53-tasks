<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ header }}

                        <div class="pull-right">
                            Tasks: {{ completedCount }}/{{ totalCount }}
                        </div>
                    </div>
                    <div class="panel-body">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        computed: {
            header() {
                return this.$route.meta.breadcrumb;
            },
            ...mapGetters(['totalCount', 'completedCount'])
        },
        methods: {
            ...mapActions(['loadTodos'])
        },
        mounted() {
            this.loadTodos();
        }
    }
</script>