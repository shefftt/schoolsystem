<?php $class_id = 0 ?>

<div class="container mt-5">
    <div class="col-md-12 row mt-2">
        <a name="" id="" class="btn btn-primary"
            href="<?= base_url() ?>index.php/admin/tip_class/<?= $trainees_course[0]->id; ?>" role="button">حصه
            اكراميه</a>

    </div>
    <br>
    <br>
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">

                    <h4 class="card-title">حصص متدرب : <b><?= $trainee->name ?></b></h4>
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line   nav-tabs-line-right nav-tabs-line-brand"
                    role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_portlet_tab_1_1" role="tab">
                            الجدول
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_1_2" role="tab">
                            الدفعيات
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_1_3" role="tab">
                            اخرى
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="tab-content">

                <div class="tab-pane active" id="kt_portlet_tab_1_1">
                    <?php foreach ($trainees_course as  $course) : ?>
                    <?php if(sizeof(classes($course->id)) > 0) : ?>
                    <div class="card m-5">
                        <div class="card-body">
                            <table class="table table-border">
                                <h4 class="card-title"><?=  get_table_info("courses" , $course->course_id)->name ?></h4>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>التاريخ</th>
                                        <th>الساعه </th>
                                        <th>المدرب </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; $y = 1; $z = 1; ?>
                                    <tr>
                                        <td colspan="4">
                                            <center>
                                                <h4>
                                                    <b>
                                                        الحصص الغياب
                                                    </b>
                                                </h4>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php foreach (classes($course->id) as  $class) : ?>
                                    <?php class_status($class->id) ?>
                                    <?php if ($class->stratus == 2): ?>
                                    <tr>
                                        <td scope="row"><?= $i++ ?></td>
                                        <td> <?php if ($class->type == 0): ?>
                                            <button style="height: 1.5rem;width: 1.5rem;"
                                                class="btn btn-success btn-circle btn-icon"><i
                                                    class="flaticon2-check-mark"></i></button>
                                            <?php else: ?>

                                            <button style="height: 1.5rem;width: 1.5rem;"
                                                class="btn btn-danger  btn-circle btn-icon"><i
                                                    class="flaticon2-cancel-music"></i></button>
                                            <?php endif; ?>
                                            <?= $class->class_date ?></td>
                                        <td>00 : <?= $class->class_time ?></td>
                                        <td> <?= get_table_info("trainers" , $class->trainer_id)->name ?></td>
                                    </tr>
                                    <?php endif; ?>

                                    <?php endforeach; ?>
                                    <!-- <tr style="background-color:#000; color:#FFF"> -->
                                    <tr>
                                        <td colspan="4">
                                            <center>
                                                <h4>
                                                    <b>الحصص
                                                        المجمده
                                                    </b>
                                                </h4>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php foreach (classes($course->id) as  $class) : ?>
                                    <?php if ($class->stratus == 3): ?>
                                    <tr>
                                        <td scope="row"><?= $y++ ?></td>
                                        <td> <?php if ($class->type == 0): ?>
                                            <button style="height: 1.5rem;width: 1.5rem;"
                                                class="btn btn-success btn-circle btn-icon"><i
                                                    class="flaticon2-check-mark"></i></button>
                                            <?php else: ?>

                                            <button style="height: 1.5rem;width: 1.5rem;"
                                                class="btn btn-danger  btn-circle btn-icon"><i
                                                    class="flaticon2-cancel-music"></i></button>
                                            <?php endif; ?>
                                            <?= $class->class_date ?></td>
                                        <td>00 : <?= $class->class_time ?>
                                            -

                                            <a class="btn btn-warning btn-sm"
                                                href="<?= base_url() ?>index.php/admin/transformation/<?=  $class->id ?>">فك
                                                تجميد</a>
                                        </td>
                                        <td> <?= get_table_info("trainers" , $class->trainer_id)->name ?></td>

                                    </tr>
                                    <?php endif; ?>

                                    <?php endforeach; ?>


                                    <tr>
                                        <td colspan="4">
                                            <center>
                                                <h4>
                                                    <b>الحصص
                                                        المتبقيه
                                                    </b>
                                                </h4>
                                            </center>
                                        </td>
										

                                    </tr>
                                    <?php foreach (classes($course->id) as  $class) : ?>
                                    <?php if ($class->stratus == 0): ?>
                                    <tr>
                                        <td scope="row"><?= $z++ ?></td>
                                        <td>

                                            <?php if ($class->type == 0): ?>
                                            <button style="height: 1.5rem;width: 1.5rem;"
                                                class="btn btn-success btn-circle btn-icon"><i
                                                    class="flaticon2-check-mark"></i></button>
                                            <?php else: ?>

                                            <button style="height: 1.5rem;width: 1.5rem;"
                                                class="btn btn-danger  btn-circle btn-icon"><i
                                                    class="flaticon2-cancel-music"></i></button>
                                            <?php endif; ?>
                                            <?= $class->class_date ?>
                                        </td>
                                        <td>00 : <?= $class->class_time ?>
                                            <a class="btn btn-danger btn-sm"
                                                href="<?= base_url() ?>index.php/admin/freeze/<?=  $class->id ?>">
                                                تجميد</a>
                                            <a class="btn btn-success btn-sm"
                                                href="<?= base_url() ?>index.php/admin/transformation/<?=  $class->id ?>">
                                                تجويل</a>
                                            <?php  $class_id  =  $class->trainees_course_id;  ?>

                                        </td>
                                        <td> <?= get_table_info("trainers" , $class->trainer_id)->name ?></td>

                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php if ($class_id !== 0) : ?>
                                    <tr>
                                        <td colspan=4>
                                            <center>
                                                <a href="<?= base_url() ?>index.php/admin/freeze_all/<?=  $class_id ?>"
                                                    class="btn btn-danger " role="button">تجمد الكل</a>
                                            </center>
                                        </td>
                                    </tr>

                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php else: ?>
                    <h1>الرجاء اختيار الدورات اولا</h1>
                    <?php endif; ?>
                    <hr>

                    <?php endforeach; ?>
                </div>
                <div class="tab-pane" id="kt_portlet_tab_1_2">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>المبلغ</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($trainees_payments as $payments) : ?>
                            <tr>
                                <td scope="row">1</td>
                                <td><?= $payments->amount?></td>
                                <td>2019-09-10</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="kt_portlet_tab_1_3">
                    <!-- اضافة تفاي اضافيه هنا -->
                </div>
                <center>

                    <a class="btn btn-primary"
                        href="<?=  base_url()?>index.php/admin/print_table/<?= $trainees_course[0]->id ?>"
                        role="button">طباعه الجدول</a>
                </center>
            </div>
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
