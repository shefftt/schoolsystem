<div class="container mt-5">
    <br>
    <br>

    <table class="table table-bordered ">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>الشهر</th>
                <th>الموظف</th>
                <th>ملاحظات</th>
                <th>المجموع</th>
                <th>التاريخ</th>
                <th>اعدادات</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($payrolls as $payroll): ?>
            <tr>
                <td scope="row"><?= $i++ ?></td>
                <td> <?=  $payroll->month ?></td>
               
                <td> <?=  user_info($payroll->user_id)->name ?></td>
                <td><?=  $payroll->note ?></td>
                <td><?=  $payroll->total ?></td>
                <td><?=  $payroll->created_at ?></td>
                <td>
				<?php if($payroll->status == 0 ) :?>
                    <a name="" id="" class="btn btn-sm btn-primary"
                        href="<?= base_url() ?>index.php/admin/payroll_update/<?= $payroll->id ?>"
                        role="button">تصديق</a>
                    <?php else: ?>
                    <p class="btn btn-sm btn-success">تم التصديق</p>
                    <?php endif; ?>
                    <a class="btn btn-sm btn-warning"
                        href="<?= base_url() ?>index.php/admin/payroll/<?= $payroll->id ?>">التفاصيل</a>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
