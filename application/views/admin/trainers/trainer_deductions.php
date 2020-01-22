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

                <a href="<?= base_url() ?>index.php/admin/trainer/<?= $trainer->id  ?>"
                    class="btn btn-primary m-3">الجدول</a>
                <a href="<?= base_url() ?>index.php/admin/trainer_loans/<?= $trainer->id ?>"
                <a href="<?= base_url() ?>index.php/admin/trainer_deductions/<?= $trainer->id ?>"
                    class="btn btn-primary m-3">السلفيات</a>
                <a href="#" class="btn btn-primary m-3">الحصص</a>
                <button type="button" class="btn btn-primary  m-3" data-toggle="modal" data-target="#exampleModal">
                    اضافة خصم
                </button>
            </div>
        </div>

    </div>
    <div class="card m-5">

        <div class="card-body">
            <table class="table table-border">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>سلفيه</th>
                        <th>سلفيه مخصومه </th>
                        <th>حاله الصرف</th>
                        <th>حاله الاعتماد</th>
                        <th>التاريخ</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- loans `amunt`, `user_type`, `status`, `pay`, `user_id`, `transaction_type` -->
                    <?php $i = 1; $in = 0; $out = 0; foreach (tr_loans($trainer->id  , "trainers") as $tr_loans) :?>
                    <tr>
                        <td scope="row"><?= $i++ ?></td>
                        <td scope="row"><?php if ($tr_loans->transaction_type == "in") : $in += $tr_loans->amunt;?>
                            <?= $tr_loans->amunt ?>
                            <?php else: ?>
                            -
                            <?php endif; ?>
                        </td>
                        <td scope="row"><?php if ($tr_loans->transaction_type == "out") : $out += $tr_loans->amunt;?>
                            <?= $tr_loans->amunt ?>
                            <?php else: ?>
                            -
                            <?php endif; ?>
                        </td>
                        <td scope="row">
                            <?php if ($tr_loans->pay == 0): ?>
                            لم يتم الصرف
                            <?php else: ?>
                            <label class="col-form-label"> تم الصرف</label>
                            <?php endif; ?>
                        </td>

                        <td scope="row">
                            <?php if ($tr_loans->status == 0): ?>
                            قيد المراجعه
                            <?php elseif ($tr_loans->status == 1): ?>
                            تم الاعتماد
                            <?php else: ?>
                            مرفوض
                            <?php endif; ?>
                        </td>
                        <td scope="row"><?= $tr_loans->created_at ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <hr>
            <h4>رصيد مرحل : <?= $in - $out; ?></h4>
        </div>
    </div>


</div>


<!-- Modal -->
<form action="<?= base_url()?>index.php/admin/add_deduction" method="post">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة خصم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">المبلغ</label>
                        <input type="text" class="form-control" required="true" name="amount" placeholder="">
                        <input type="hidden" value="<?= $trainer->id ?>" name="user_id">
                        <input type="hidden"  value="trainers"  name="type">
                    </div>
                    <div class="form-group">
                        <label for="">السبب</label>
                        <textarea class="form-control"  required="true" name="note" id="" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="type" class="btn btn-primary">اضافة</button>
                </div>

            </div>
        </div>
    </div>
</form>
