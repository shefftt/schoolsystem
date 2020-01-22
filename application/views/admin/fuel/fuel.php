<div class="card m-2">

    <div class="card-body">
        <div class="card-header ">
            <div class="row pt-1">
                <div class="form-group">
                    <h4 class="card-title">الرصيد : <?= $fuel_balance ?></h4>
                </div>
                <div class="form-group ml-auto">

                    <button type="button" class="btn btn-primary left" data-toggle="modal" data-target="#myModal"> تغذيه
                        وقود</button>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="kt-portlet kt-portlet--tabs">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                ملف الوقود
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line   nav-tabs-line-right nav-tabs-line-brand"
                role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#kt_portlet_tab_1_1" role="tab">
                        تغذيه التزاكر
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_1_2" role="tab">
                        الوقود المسحوب
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
                            <td scope="row">#</td>
                            <td>عدد التزاكر</td>
                            <td>التاريخ</td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1; foreach ($fuel_tickets as $tickets) : ?>
                        <tr>
                            <td scope="row"><?= $i?></td>
                            <td scope="row"><?= $tickets->balance ?></td>
                            <td scope="row"><?= $tickets->created_at ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="kt_portlet_tab_1_2">
                <table class="table">
                    <!-- fuel_history   `number_of_tickets`, `car_id`, `odometer`, `trainer_id` -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>العدد</th>
                            <th>السياره</th>
                            <th>العداد</th>
                            <th>السائق</th>
                            <th>التاريخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($fuel_history as $fuel) : ?>
                        <tr>
                            <td scope="row"><?= $i++ ?></td>
                            <td><?= $fuel->number_of_tickets ?></td>
                            <td>
                                <?= get_table_info('cars' ,$fuel->car_id)->name ?>
                                <?= get_table_info('cars' ,$fuel->car_id)->car_nmuber ?>
                            </td>
                            <td><?= $fuel->odometer ?></td>
                            <td><?= trainer($fuel->trainer_id) ?></td>
                            <td><?= $fuel->created_at ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url() ?>index.php/admin/fuel_post" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">تعبئه الوقود</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">عدد التزاكر</label>
                        <input type="text" class="form-control" name="balance" id="" aria-describedby="helpId"
                            placeholder="">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-success">اضافة</button>
                </div>
            </form>
        </div>
    </div>
</div>
