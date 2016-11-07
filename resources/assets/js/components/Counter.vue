<template>
    <div>
        Counter: {{ count }}
        <button @click="increment">Increment Mutation</button>
        <button @click="incrementAsync">Increment Action</button>
    </div>
</template>

<script>
    import {mapState, mapMutations} from 'vuex';

    export default {
        methods: {
            incrementAsync() {
                this.$store.dispatch('incrementAsync');
            },
            ...mapMutations(['increment'])
        },
        computed: mapState(['count'])
    }
</script>