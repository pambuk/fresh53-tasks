<template>
    <div>
        Counter: {{ count }} <button @click="increment">Increment</button>
    </div>
</template>

<script>
    import {mapState} from 'vuex';

    export default {
        methods: {
            increment: function () {
                this.$store.commit('increment');
            }
        },
        computed: mapState(['count'])
    }
</script>