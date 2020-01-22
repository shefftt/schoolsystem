<!-- classes `trainees_course_id`, `class_date`, `class_time`, `trainer_id`, `stratus`, `color_style` -->
<div class="container mt-4" id="app">
    <div class="card">
        <div class="card-body">
            <table class="table table-border">
                <thead>
                    <tr>
                        <th>اسم المتدرب</th>
                        <th>رقم الهاتف</th>
                        <th>اسم الدورة</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- trainees_course `trainee_id`, `trainer_id`, `price`, `start_date`, ``, ``, `course_id`, `` -->
                    <tr>
                        <td><?= get_table_info("trainees" , $trainees_course->trainee_id)->name ?></td>
                        <td><?= get_table_info("trainees" , $trainees_course->trainee_id)->phone ?></td>
                        <td><?= get_table_info("courses" , $trainees_course->course_id)->name ?></td>

                    </tr>
                </tbody>
            </table>
            <hr class="mt-5 mb-5">
            <form action="<?= base_url()?>index.php/admin/not_sequential_setup_2" method="post">
                <a class="row">
                    <div class="form-group col-md-6">
                        <label for="">اسم المدرب</label>
                        <select class="form-control" class="form-controle" name="trainer_id" id="">
                            <?php foreach($trainers as $trainer) : ?>
                            <option value="<?= $trainer->id ?>"><?= $trainer->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">تاريخ نهايه الكورس</label>
                        <input type="date" required class="form-control" name="end_date">
                        <input type="hidden" name="number_of_dayes" value="<?= $trainees_course->number_of_days ?>">

                    </div>
                    <input type="hidden" value="<?= $course_id ?>" name="course_id">
                    <div class="form-group">
                        <button class="btn btn-md btn-info" type="submit">عرض</button>
                    </div>
        </div>
        </form>

    </div>


</div>

<hr>

</div>
</div>

<script>
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
var app = new Vue({
    el: '#app',
    data: {
        years: < ? = $date_array ? > ,
        techaer_id: 0,
        trainers: [],
        start_date: new Date().getFullYear() + '-' + (new Date().getMonth() + 1) + '-' + new Date().getDate(),

    },
    mounted() {
        this.get_all_techaers()
    },
    methods: {
        get_all_techaers() {
            axios.get("http://localhost/drivingschool/index.php/api/get_all_techaers").then(response => (this
                .trainers = response.data))
        },
        get_techaer_course(course_date, course_time) {
            axios.get('http://localhost/drivingschool/index.php/api/get_techaer_course', {
                    params: {
                        techaer_id: this.techaer_id,
                        course_date: course_date,
                        course_time: course_time,
                    }
                })
                .then(response => (response.data))
                .catch(function(error) {
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });
        },
        show_trainer(techaer_id) {

            this.techaer_id = techaer_id;
            console.table(this.years)


        }
    }
})
</script>
