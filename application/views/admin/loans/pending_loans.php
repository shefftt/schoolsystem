<div class="container mt-5">
    <table class="table table-bordered">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>المبلغ</th>
                <th>العمليه</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($loans as $loan) : ?>

            <tr>
                <td scope="row"><?= $i++ ?></td>
                <td><?= get_table_info($loan->user_type , $loan->user_id)->name?></td>
                <td><?= $loan->amunt ?></td>
                <td>
				<a  id="" class="btn btn-success" href="<?= base_url()?>index.php/admin/approve_loan/<?= $loan->id ?>" role="button">تصديق</a>
				<a  id="" class="btn btn-danger" href="<?= base_url()?>index.php/admin/reject_loan/<?= $loan->id ?>" role="button">رفض</a>
				</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
