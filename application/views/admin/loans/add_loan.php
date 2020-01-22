<div class="container mt-5" id="app">
    <form action="<?= base_url() ?>index.php/admin/add_loan_post" method="post">
        <!-- // loans `id`, `amunt`, `user_type`, `status`, `user_id`, `created_at` -->
        <!--  -->
        <div class="">
            <div class="form-group ">
                <label for="">المبلغ</label>
                <input type="text" class="form-control" required="true" name="amunt" id="" aria-describedby="helpId"
                    placeholder="">
            </div>

            <div class="form-group ">
                <label for="">الموظف</label>
                <select v-on:change="changeItem( $event)" v-model="table" class="form-control" name="user_type" id="">
                    <option value="users">موظف</option>
                    <option value="trainers">مدرب</option>
                </select>
            </div>

            <div class="form-group ">
                <label for="">النوع</label>
                <select class="form-control" name="user_id" id="">
                    <option v-for="user in users" :key="user.id" :value="user.id">
                        {{user.name}}
                    </option>

                </select>
            </div>
            <div class="form-group">
                <label for="">البيان</label>
                <textarea required="true" class="form-control" name="" id="" rows="3"></textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="طلب">
        </div>
    </form>
    <h1>{{ahmed}}</h1>
</div>
<script>
"use strict";

var app = new Vue({
    el: '#app',
    data: {
        table: "users",
        ahmed: "",
        users: [],
        rowId: 10
    },
    methods: {
        changeItem: function(event) {
            this.select_user(event.target.value)
        },
        select_user: function(table) {

            axios.get('<?= base_url() ?>index.php/api/get_users', {
                    params: {
                        table: table,
                    }
                })
                .then(response => (this.users = response.data))
                .catch(function(error) {
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });
        }

    }
});
</script>
