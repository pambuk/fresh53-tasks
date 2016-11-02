<template>
    <div>
        Counter: {{ count }} <button @click="increment">Increment</button>
    </div>
</template>

<script>
    export default {
        methods: {
            increment: function () {
                this.$store.commit('increment');
            }
        },
        computed: {
            count() {
                return this.$store.state.count;
            }
        }
    }
</script>