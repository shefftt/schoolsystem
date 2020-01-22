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
                    <h3>عرض جميع الكورسات</h3>
                </div>
                <hr>
                <div class="col-md-6 text-right">
                    <a name="" id="" class="btn btn-success  ml-auto" href="<?= base_url() ?>index.php/admin/course_add"
                        role="button">اضافة دورة</a>
                </div>

            </div>
        </div>
        <table class="table table-striped table-inverse">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>اسم الكورس</th>
                    <th>التصنيف</th>
                    <th>السعر</th>
                    <th>الحافز</th>
                    <th>عدد الايام</th>
                    <th>النوع</th>
                    <th>اعدادات</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($courses as $course) : ?>
                <!-- courses `id`, `price`, `name`, `allowance`, `category_id`, `number_of_days`, `vip`, `created_at` -->
                <tr>
                    <td scope="row"><?= $i++ ?></td>
                    <td><?= $course->name ?></td>
                    <td><?= category_courses($course->category_id)->name ?></td>
                    <td><?= $course->price ?></td>
                    <td><?= $course->allowance ?></td>
                    <td><?= $course->number_of_days ?></td>
                    <td>
                        <?php if ($course->vip == 0) : ?>
                        <button class="btn"><span class="badge badge-primary">VIP</span>
                        </button>
                        <?php else: ?>

                        <button class="btn"><span class="badge badge-primary">عادي</span>
                            <?php endif; ?>

                    </td>
                    <td>

                        <a href="<?= base_url() ?>index.php/admin/course_edit/<?= $course->id ?>" class="badge badge-danger">تعديل</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
