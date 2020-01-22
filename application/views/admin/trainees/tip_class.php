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
                    <!-- trainees_course `trainee_id`, `trainer_id`, `price`, `class_date`, ``, ``, `course_id`, `` -->
                    <tr>
                        <td><?= get_table_info("trainees" , $course->trainee_id)->name ?></td>
                        <td><?= get_table_info("trainees" , $course->trainee_id)->phone ?></td>
                        <td><?= get_table_info("courses" , $course->course_id)->name ?></td>

                    </tr>
                </tbody>
            </table>
            <hr class="mt-5 mb-5">
			<center>
			<h2 style="color:red">
			<?php if(isset($_SESSION['some_name'])){ echo $_SESSION['some_name']; unset($_SESSION['some_name']);} ?>

			</h2>
			</center>
			<br>
            <form action="<?= base_url() ?>index.php/admin/tip_class_post" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">تاريخ بدايه الورس</label>
                        <input type="date" v-model="class_date" name="class_date" class="form-control" required="true">
                    </div>
                    <div class="form-group col-md-6">
                        <label for=""> زمن الورس</label>
						  <select required="true" v-model="class_time" class="form-control" name="class_time">
							<?php for($i = 6; $i <= 18; $i++) : ?>
							<option value="<?= $i ?>"><?= $i ?></option>
							<?php endfor; ?>
						  </select>
					</div>
					<div class="form-group row">
					<select name="trainer_id" class="form-control">
						<option  v-for="trainer in trainers" :key="trainer.id" :value="trainer.id">
							{{trainer.name}}
						</option>
					</select>
                    </div>
                        <input type="hidden" name="trainee_id" value="<?= $course->trainee_id ?>" class="form-control" require>
                        <input type="hidden" name="trainees_course_id" value="<?= $course->id ?>" class="form-control" require>
                         <div class="form-group col-md-12">
					<button class="btn btn-md btn-success" type="submit">اضافة حصه اكراميه</button>
					<button @click="select_tacher" class="btn btn-md btn-info" type="button">اختيار الاستاذ</button>
					
                </div>
                </div>
            </form>

        </div>


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
        trainers: [],
        class_date: '',
        class_time: 6
		
    },
    mounted() {
    },
    methods: {
		
        select_tacher() {
            if (this.class_date == "")

                toastr["error"]('اسم التاريخ اجبارى', "خطاء")


            else {
					axios.get('<?= base_url() ?>index.php/api/get_techaers_transformation', {
                        params: {
							class_date : this.class_date,
							class_time : this.class_time,
                        }
                    })
                    .then(response => ( this.trainers = response.data))
                    .catch(function(error) {
                        console.log(error);
                    })
                    .then(function() {
                        // always executed
                    });
            }
        },
   
        get_cat() {
            axios.get("<?= base_url() ?>/index.php/api/get_all_courses").then(response => (this
                .cats = response.data))
        },
    }
})
</script>
