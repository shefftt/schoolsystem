<div class="col-md-12">
    <div class="card m-4 b-2">
        <?php if ($this->session->flashdata('success_message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><?= $this->session->flashdata('success_message'); ?></strong>
        </div>
        <?php endif; ?>
        <script>
        $(".alert").alert();
        </script>
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h3>عرض جميع المدربين</h3>
                </div>
                <hr>
                <div class="col-md-6 text-right">
                    <a name="" id="" class="btn btn-success  ml-auto"
                        href="<?= base_url() ?>index.php/admin/trainer_add" role="button">اضافة مدرب</a>
                </div>

            </div>
        </div>
        <table class="table table-striped table-inverse">
            <thead class="thead-inverse">
                <!-- trainers `name`, `phone`, `car_id`, `address`, `gender`, `status` -->
                <tr>
                    <th>#</th>
                    <th>اسم المدرب</th>
                    <th>رقم الهاتف</th>
                    <th>رقم السياره</th>
                    <th> العتوان</th>
                    <th>النوع</th>
                    <th> الحاله</th>
                    <th>اعدادات</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($trainers as $trainer) : ?>
                <!-- courses `id`, `price`, `name`, `allowance`, `category_id`, `number_of_days`, `vip`, `created_at` -->
                <tr>
                    <td scope="row"><?= $i++ ?></td>
                    <td><?= $trainer->name ?></td>
                    <td><?= $trainer->phone ?></td>
                    <td>
                        <?php if (get_table_info('cars' , $trainer->car_id)->model !== null) :?>
                        <?= get_table_info('cars' , $trainer->car_id)->name ?>
						-  <?= get_table_info('cars' , $trainer->car_id)->car_nmuber ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $trainer->address ?></td>
                    <td><?= $trainer->gender ?></td>
                    <td><?php if ($trainer->status == 0) : ?>
                        <button class="btn">
                            <span class="badge badge-danger">متوقف</span>
                        </button>
                        <?php else: ?>
                        <button class="btn">
                            <span class="badge badge-primary">نشط</span>
                        </button>
                        <?php endif; ?>
                    </td>
                    <td>

                        <a href="<?= base_url() ?>index.php/admin/trainer/<?=  $trainer->id ?>"
                            class="badge badge-success">عرض</a>
                        <a href="<?= base_url() ?>index.php/admin/trainer_edit/<?=  $trainer->id ?>"
                            class="badge badge-danger">تعديل</a>
                        <?php if ($trainer->status == 1) : ?>
						<a href="<?= base_url() ?>index.php/admin/trainer_deactivate/<?=  $trainer->id ?>"
                            class="badge badge-danger"> ايقاف</a>
                        <?php else: ?>
						<a href="<?= base_url() ?>index.php/admin/trainer_deactivate/<?=  $trainer->id ?>"
                            class="badge badge-info"> تنشيط</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
