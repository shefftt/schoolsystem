<?php

$class = "";
 $tody = new DateTime(date("Y-m-d" , strtotime("-1 days")));
 $tody2 = new DateTime(date("Y-m-d"));
 
 ?>

<div id="app">
    <div v-if="show_trainees_list" class="card m-5">
        <div class="card-body">
            <div class="row">
                <div class="kt-grid__item kt-app__toggle kt-app__aside col-md-4" id="kt_user_profile_aside">
                    <!--Begin::Portlet-->
                    <div class="kt-portlet kt-portlet--height-fluid-">
                        <div class="kt-portlet__head kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">

                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                <span class="kt-nav__link-text">Reports</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-2">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        <img class="kt-widget__img kt-hidden-"
                                            src="<?= base_url() ?>assets/media/users/100_1.jpg" alt="image">
                                        <div
                                            class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                            MP
                                        </div>
                                    </div>
                                    <div class="kt-widget__info">
                                        <a href="#" class="kt-widget__username">
                                            <?= $trainer->name ?>
                                        </a>
                                    </div>
                                </div>

                                <div class="kt-widget__body">


                                    <div class="kt-widget__item">
                                        <div class="kt-widget__contact">
                                            <span class="kt-widget__label">الهاتف :</span>
                                            <a href="#" class="kt-widget__data"><?= $trainer->phone ?></a>
                                        </div>
                                        <div class="kt-widget__contact">
                                            <span class="kt-widget__label">العنوان :</span>
                                            <span class="kt-widget__data">ام درمان الثوره</span>
                                        </div>
                                        <div class="kt-widget__contact">
                                            <span class="kt-widget__label">الرصيد :</span>
                                            <span class="kt-widget__data"><?= $sum ?> جنيه</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Widget -->
                        </div>
                    </div>
                    <!--End::Portlet-->


                </div>

            </div>
			<div class="col-md-12 row">
		
		<a href="<?= base_url() ?>index.php/admin/trainer/<?= $trainer_id ?>" class="btn btn-primary m-3">الجدول</a> 
		<a href="<?= base_url() ?>index.php/admin/trainer_loans/<?= $trainer_id ?>" class="btn btn-primary m-3">السلفيات</a> 
		<a href="#" class="btn btn-primary m-3">الخصومات</a> 
		<a href="#" class="btn btn-primary m-3">اضافة خصم</a> 
	</div>
        </div>
       
    </div>
    <div class="card m-5">

        <div class="card-body">
            <table class="table table-border">
                <thead>
                    <tr>
                        <th>التاريخ</th>
                        <?php for ($i=6; $i < 19; $i++) :?>
                        <th><?= $i ?></th>
                        <?php endfor;?>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($tody->format('Y-m-d') <= "2020-1-17" ) { $tody->modify('+1 day') ?>
                    <tr>
                        <td scope="row" d><?= $tody->format('Y-m-d') ?></td>
                        <?php for ($i=6; $i < 19; $i++) :?>
                        <?php  get_class_info($tody->format('Y-m-d') , $i , $trainer_id) ? $class = "btn-danger" :  $class = "btn-success" ;?>
                        <td class="bg-geen">

                            <center>
                                <?php  if(get_class_info($tody->format('Y-m-d') , $i , $trainer_id) == 0) :?>
                                <p onclick="myFunction('<?= $tody->format('Y-m-d')?>' ,<?= $i?>  )"
                                    class="<?= $class ?>">
                                    -
                                </p>
                                <?php  else:?>
                                <p data-toggle="tooltip"
                                    title="<?= get_std_info($tody->format('Y-m-d') , $i , $trainer_id)->name ?>"
                                    class="<?= $class ?>">
                                    X
                                </p>
                                <?php  endif;?>


                            </center>
                        </td>
                        <?php endfor;?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
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
        trainees_course_list: [],
        i: 1,
        show_trainees_list: true,
        course_type: 1,
        serial: null,
        start_date: null,
        end_date: null,
        trainer_id: null,

    },
    mounted() {
        this.trainees_course()
    },
    methods: {

        trainees_course() {
            axios.get("http://localhost/drivingschool/index.php/api/get_new_trainees").then(response => (this
                .trainees_course_list = response.data))
        },

        attachment_trainee_courses(trainee_courses) {
            console.log(trainee_courses)
            this.show_trainees_list = false
        }
    },
    computed: {
        reversedMessage: function() {
            if (this.course_type === 1) {
                console.log('متسلسل')
                return true
            } else if (this.course_type === 2) {
                console.log('غير متسلسل')
                return false
            }
        }
    }
})
</script>
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
