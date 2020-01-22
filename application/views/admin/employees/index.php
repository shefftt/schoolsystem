<div class="container mt-5">
    <a class="btn btn-primary" href="<?= base_url()  ?>index.php/admin/employee_add" role="button">اضافة موظف</a>
    <br>
    <br>
    <table class="table table-bordered ">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الجهه</th>
                <th>المرتب</th>
                <th>اعدادات</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($users as $user): ?>
            <tr>
                <td scope="row"><?= $i++ ?></td>
                <td><?=  $user->name ?></td>
                <td>
                    <?php if($user->school_id > 0 ) :?>
					<?= get_school_info($user->school_id)->name ?>
                    <?php else: ?>
					<?= $user->school_id ?>
                    <?php endif; ?>

                </td>
                <td><?=  $user->salary ?></td>
                <td>
                    <a class="btn btn-success btn-sm" href="#" role="button">عرض</a>
                    <a class="btn btn-danger btn-sm" href="#" role="button">ايقاف</a>
                </td>
                <td></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
