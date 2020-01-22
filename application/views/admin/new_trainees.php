<div id="app">
    <div v-if="show_trainees_list" class="card m-5">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12 col-lg-12 order-lg-12 order-xl-12">
                    <!--begin:: Widgets/Download Files-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    الطلاب الجدد
                                </h3>
                            </div>

                        </div>
                        <div class="kt-portlet__body">
                            <!--begin::k-widget4-->
                            <div class="kt-widget4">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم </th>
                                            <th>رقم الهاتف</th>
                                            <th>الضبط</th>
                                            <th>التاريخ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="trainee in trainees_course_list" :key="trainee.id">
                                            <th scope="row">{{(i++)}}</th>
                                            <td>{{trainee.name}}</td>
                                            <td>{{trainee.phone}}</td>
                                            <td>
                                                <p v-on:click="attachment_trainee_courses(trainee)"
                                                    class="btn btn-md btn-info">اختيار الكورس </p>
                                            </td>
                                            <td>{{trainee.created_at}}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <!--end::Widget 9-->
                        </div>
                    </div>
                    <!--end:: Widgets/Download Files-->
                </div>



            </div>

        </div>
    </div>
    <div v-if="!show_trainees_list" class="card m-5">

        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-6">
                    <label>نوع الكورس</label>
                    <div class="kt-radio-inline">
                        <label class="kt-radio">
                            <input type="radio" v-model="course_type" :value="1"> متسلسل
                            <span></span>
                        </label>
                        <label class="kt-radio">
                            <input type="radio" v-model="course_type" :value="2"> غير متسلسل
                            <span></span>
                        </label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">


                        <label for="example-date-input" class="col-2 col-form-label">تاريخ البدايه</label>
                        <div class="col-10">
                            <input class="form-control" v-model="start_date" type="date" id="example-date-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">تاريخ النهايه</label>
                        <div class="col-10">
                            <input class="form-control" v-model="end_date" type="date" id="example-date-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">الزمن</label>
                        <div class="col-10">
                            <select v-model="class_time" class="form-control">
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                            </select>
                        </div>
                    </div>
					<div class="form-group row">
					<select v-model="trainer_id" class="form-control">
						<option  v-for="trainer in trainers" :key="trainer.id" v-bind:value="trainer.id">
							{{trainer.name}}
						</option>
					</select>
                    </div>
					<button @click="selectTeacher" class="btn btn-md btn-info">اختيار الاستاذ</button>

                    

                </div>
				<div class="form-group col-md-12">
                        <button  type="button" @click="add_class" class="btn btn-primary">اضافة </button>
                    </div>
            </div>
        </div>
    </div>


    <div class="card m-5">

        <div class="card-body">
            <h1 v-if="reversedMessage">selrial</h1>
            <h1 v-else>Not selrial</h1>
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
        trainees_course_list: [],
        i: 1,
        show_trainees_list: true,
        course_type: 1,
        serial: null,
        start_date: null,
        end_date: null,
        trainer_id: null,
        number_of_days: null,
        class_time: 6,
        course_id: 1,
        price: 0,
        id: null,

    },
    mounted() {
		this.trainees_course()
    },
    methods: {
		selectTeacher(){
			

			axios.get('http://localhost/drivingschool/index.php/api/get_techaers', {
                        params: {
							start_date: this.start_date,
							end_date: this.end_date,
							class_time: this.class_time,
                        }
                    })
                    .then(response => ( this.trainers = response.data))
                    .catch(function(error) {
                        console.log(error);
                    })
                    .then(function() {
                        // always executed
                    });
		},
        trainees_course() {
            axios.get("http://localhost/drivingschool/index.php/api/get_new_trainees").then(response => (this
                .trainees_course_list = response.data))

        },
        start_date_change() {
            console.log(this.start_date + " - " + this.end_date + " - " + this.trainer_id)
        },

        attachment_trainee_courses(trainee_courses) {

            this.number_of_days = trainee_courses.number_of_days
            this.course_id = trainee_courses.course_id
            this.trainer_id = trainee_courses.trainer_id
            this.price = trainee_courses.price
            this.id = trainee_courses.id

            console.log(this.number_of_days)

            this.show_trainees_list = false
        },
        add_class() {
            if (this.number_of_days < 1)

                toastr["error"]('عدد الايام يجب ان يكون اكبر من صفر', "خطاء")

            else if (this.phone == "")
                toastr["error"]('رقم المتدرب اجبارى', "خطاء")

            else if (this.course_id == 0)
                toastr["error"]('الرجاء تحديد الكورس', "خطاء")

            else {
                axios.get('http://localhost/drivingschool/index.php/api/add_class_post', {
                        params: {
                            start_date: this.start_date,
                            number_of_days: this.number_of_days,
                            end_date: this.end_date,
                            trainer_id: this.trainer_id,
                            class_time: this.class_time,
                            course_id: this.course_id,
                        }
                    })
                    .then(function(response) {

                        this.name = ''
                        this.phone = ''
                        this.address = ''
                        this.invited_from = ''
                        this.amount = 0
                        this.course_id = 0
                        this.number_of_days = 0

						toastr["success"](response.data.message)
						
						console.log(response.data.message);


                    })
                    .catch(function(error) {
                        console.log(error);
                    })
                    .then(function() {
                        // always executed
                    });
            }
        },
    },
    computed: {
        reversedMessage: function() {
            if (this.course_type === 1) {
                return true
            } else if (this.course_type === 2) {
                return false
            }
        }
    }
})
</script>
