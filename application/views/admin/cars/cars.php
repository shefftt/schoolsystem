<div id="app">
    <div v-if="show_trainees_list" class="card m-5">
        <div class="card-body">
            <div class="row">
                <?php if ($this->session->flashdata('success_message')) : ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><?= $this->session->flashdata('success_message'); ?></strong>
                </div>
                <?php endif; ?>
                <div class="col-xl-12 col-lg-12 order-lg-12 order-xl-12">
                    <!--begin:: Widgets/Download Files-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    السيارات
                                </h3>
                            </div>
                            <div class="col-md-3 text-right">

                                <a href="#" class="btn btn-md btn-info">اضافة سياره</a>
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
                                            <th>الموديل</th>
                                            <th>رقم اللوحه</th>
                                            <th>بدايه التامين</th>
                                            <th>نهايه التامين التامين</th>
                                            <th>بدايه الترخيص</th>
                                            <th>المنصع</th>
                                            <th>اعدادات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach($cars as $car) : ?>
                                        <!-- cars `name`, `model`, `car_nmuber`, `insurance_starting_date`, `insurance_ending_date`, `license_date`, `manufacturing` -->
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $car->name ?></td>
                                            <td><?= $car->model ?></td>
                                            <td><?= $car->car_nmuber ?></td>
                                            <td><?= $car->insurance_starting_date ?></td>
                                            <td><?= $car->insurance_ending_date ?></td>
                                            <td><?= $car->insurance_ending_date ?></td>
                                            <td><?= $car->manufacturing ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-success"
                                                    href="<?= base_url() ?>index.php/admin/car/<?= $car->id ?>">عرض</a>
                                                <a class="btn btn-sm btn-info"
                                                    href="<?= base_url() ?>index.php/admin/car_edit/<?= $car->id ?>">تعديل</a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>

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
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">الموديل</label>
                        <div class="col-10">
                            <input class="form-control" v-model="model" type="date" id="example-date-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">الاسم</label>
                        <div class="col-10">
                            <input class="form-control" v-model="name" type="text" id="example-date-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">رقم اللوحه</label>
                        <div class="col-10">
                            <input class="form-control" v-model="car_nmuber" type="text" id="example-date-input">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group p-2">

                            <button v-on:click="add_car" class="btn btn-md btn-info">اضافة سياره</button>
                        </div>

                        <div class="form-group p-2">
                            <button v-on:click="add_car_form" class="btn btn-md btn-success">كل السيارات</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
