<!-- cars `name`, `model`, `car_nmuber`, `insurance_starting_date`, `insurance_ending_date`, `license_date`, `manufacturing` -->
<div class="card text-left">
    <div class="card-body">
        <h4 class="card-title"> سياره رقم : <?= $car->car_nmuber ?></h4>

    </div>

</div>

<div class="kt-portlet kt-portlet--tabs">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                ملف السياره
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line   nav-tabs-line-right nav-tabs-line-brand"
                role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#kt_portlet_tab_1_1" role="tab">
                        البيانات الاساسيه
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_1_2" role="tab">
                        الوقود
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_1_3" role="tab">
                        الصيانه
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="tab-content">
            <div class="tab-pane active" id="kt_portlet_tab_1_1">
                <table class="table">
                    <thead class="thead-inverse">
                        <tr>
                            <td scope="row">السائق</td>
                            <td>الموديل</td>
                            <td>بدايه التامين</td>
                            <td>الترخيص</td>
                            <td>المصنع</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"><?= get_car_driver($car->id) ?></td>
                            <td scope="row"><?= $car->model ?></td>
                            <td scope="row"><?= $car->insurance_starting_date ?></td>
                            <td scope="row"><?= $car->license_date ?></td>
                            <td scope="row"><?= $car->manufacturing ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="kt_portlet_tab_1_2">
                <table class="table">
                    <!-- fuel_history   `number_of_tickets`, `car_id`, `odometer`, `trainer_id` -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>التذاكر</th>
                            <th>العداد</th>
                            <th>المدرب</th>
                            <th>التاريخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($fuel_history as $fuel) : ?>
                        <tr>
                            <td scope="row"><?= $i++ ?></td>
                            <td><?= $fuel->number_of_tickets ?></td>
                            <td><?= $fuel->car_id ?></td>
                            <td><?= $fuel->odometer ?></td>
                            <td><?= $fuel->trainer_id ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="kt_portlet_tab_1_3">
                الصيانات الاخرى
            </div>
        </div>
    </div>
</div>
