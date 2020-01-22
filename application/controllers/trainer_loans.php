
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
		
		<a href="<?= base_url() ?>index.php/admin/trainer/<?= $trainer->id  ?>" class="btn btn-primary m-3">الجدول</a> 
		<a href="<?= base_url() ?>index.php/admin/trainer_loans/<?= $trainer->id ?>" class="btn btn-primary m-3">السلفيات</a> 
		<a href="#" class="btn btn-primary m-3">الحصص</a> 
		<a href="#" class="btn btn-primary m-3">اضافة خصم</a> 
	</div>
        </div>
       
    </div>
    <div class="card m-5">

        <div class="card-body">
            <table class="table table-border">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>1</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">#</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>

