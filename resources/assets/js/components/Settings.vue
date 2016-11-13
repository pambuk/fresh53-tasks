<template>
    <div>
        <h5>Password change for {{ username }}</h5>
        <div class="form-group col-md-4 col-md-offset-4">
            <div class="form-group">
                <input v-model="password.new" type="password" class="form-control" placeholder="New password">
            </div>
            <div class="form-group">
                <input v-model="password.repeat" type="password" class="form-control" placeholder="Repeat new password">
            </div>
            <div class="form-group">
                <input v-model="password.old" type="password" class="form-control" placeholder="Old password">
            </div>
            <button @click="changePassword(password)" class="btn btn-success pull-right">Change</button>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                password: {}
            };
        },
        computed: {
            username() {
                return Laravel.user.email;
            }
        },
        methods: {
            changePassword() {
                this.$http.put('/api/change-password', {
                    password: this.password
                });
            }
        }
    }
</script>