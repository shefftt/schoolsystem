<div id="app">
    <div class="col-xl-8 order-lg-2 order-xl-1">
        <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        عرض بيانات جميع المتدربين
                    </h3>
                </div>

            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">
                <!--begin: Datatable -->
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--scroll kt-datatable--loaded"
                    id="kt_datatable_latest_orders" style="">
                    <table class="kt-datatable__table" style="display: block; min-height: 500px; max-height: 500px;">
                        <thead class="kt-datatable__head">
                            <tr class="kt-datatable__row" style="left: 0px;">

                                <th data-field="ShipName" data-autohide-disabled="false"
                                    class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 252px;">اسم
                                        المتدرب</span></th>
                                <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                        style="width: 100px;">المبلع الكلى</span></th>
                                <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                        style="width: 100px;">الحاله</span></th>
                                <th data-field="Type" class="kt-datatable__cell kt-datatable__cell--sort"><span
                                        style="width: 200px;">Managed By</span></th>
                                <th data-field="Actions" data-autohide-disabled="false"
                                    class="kt-datatable__cell kt-datatable__cell--sort"><span
                                        style="width: 80px;">Actions</span></th>
                            </tr>
                        </thead>
                        <tbody style="max-height: 445.5px;" class="kt-datatable__body ps ps--active-y">
                            <?php foreach ($trainees as $traine) : ?>
                            <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                <td data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell">
                                    <span style="width: 252px;">
                                        <div class="kt-user-card-v2">
                                            <div class="kt-user-card-v2__pic">
                                                <img alt="photo"
                                                    src="https://keenthemes.com/metronic/preview/assets/media/client-logos/logo1.png">
                                            </div>
                                            <div class="kt-user-card-v2__details">
                                                <a class="kt-user-card-v2__name" data-toggle="modal"
                                                    data-target="#stdInfo"
                                                    href="#"><?= get_trainee_info($traine->trainee_id)->name ?></a>
                                            </div>
                                        </div>
                                    </span></td>
                                <td class="kt-datatable__cell">
                                    <span style="width: 100px;">
                                        <span class="kt-font-bold">
                                            <?= $traine->price ?>
                                        </span>
                                    </span>
                                </td>
                                <td class="kt-datatable__cell">
                                    <span style="width: 100px;">
                                        <?php if(get_traine_payments($traine->id) < $traine->price) : ?>
                                        <span class="btn btn-bold btn-sm btn-font-sm  btn-label-danger">غير مكتمل</span>
                                        <?php else: ?>
                                        <span class="btn btn-bold btn-sm btn-font-sm  btn-label-success">مكتمل</span>
                                        <?php endif; ?>
                                    </span>
                                </td>
                                <td data-field="Type" class="kt-datatable__cell"><span style="width: 200px;">
                                        <div class="kt-user-card-v2">
                                            <div class="kt-user-card-v2__pic">
                                                <div class="kt-badge kt-badge--xl kt-badge--danger">X</div>
                                            </div>
                                            <div class="kt-user-card-v2__details"> <a class="kt-user-card-v2__name"
                                                    href="#">الدورة العامه</a> 
                                            </div>
                                        </div>
                                    </span></td>
                                <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell"><span
                                        style="overflow: visible; position: relative; width: 80px;">
                                        <button @click="paymentModel(<?= $traine->id ?> , <?= $traine->course_id ?>)"
                                            type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#PaymentModal">
                                            دفع
                                        </button>
                                    </span></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
                <!--end: Datatable -->
            </div>
        </div>
    </div>


    <div class="modal fade" id="PaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">بيانات الدفعيه</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="" v-model="amount" class="form-control" placeholder="المبلغ"
                            aria-describedby="helpId">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" @click="pay" class="btn btn-primary" data-dismiss="modal">دقع</button>
                </div>
            </div>
        </div>
    </div>


    <!-- بيانات الطالب كامله  -->


    <div class="modal fade" id="stdInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">بيانات الطالب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">دقع</button>
                </div>
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
        posts: [],
        course_id: null,
        amount: null,
        trainees_course_id: null,
    },
    mounted() {},
    methods: {
        pay() {
            if (this.amount == null)

                toastr["error"]('عفوا المبلغ اجبارى', "خطاء")

            else {
                axios.get('http://localhost/drivingschool/index.php/api/pay', {
                        headers: {
                            "username": "shefftt"
                        }
                    }, {
                        params: {
                            course_id: this.course_id,
                            amount: this.amount,
                            trainees_course_id: this.trainees_course_id,
                        }
                    })
                    .then(function(response) {

                        toastr["success"](response.data.message, "نجاح")



                    })
                    .catch(function(error) {
                        console.log(error);
                    })
                    .then(function() {
                        // always executed
                    });
            }
        },
        paymentModel(trainees_course_id, course_id) {
            this.course_id = course_id
            this.trainees_course_id = trainees_course_id
        },
    }
})
</script>
