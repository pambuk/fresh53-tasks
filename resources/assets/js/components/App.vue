<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ header }}</div>
                    <div class="panel-body">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import {mapActions} from 'vuex';

    export default {
        computed: {
            header() {
                return this.$route.meta.breadcrumb;
            }
        },
        methods: {
            ...mapActions(['loadTodos'])
        },
        mounted() {
            this.loadTodos();
        }
    }
</script>