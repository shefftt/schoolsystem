<div class="container mt-5">
    <h2><?= $title ?></h2>
    <?php if (isset($all_loans)) {
	$loans = $all_loans ;
}
?>
    <br>
    <table class="table table-bordered">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>المبلغ</th>
                <?php if (isset($all_loans) AND sizeof($all_loans) > 0) {?><th>المبلغ</th> <?php } ?>
                <th>التاريخ</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($loans as $loan) : ?>

            <tr>
                <td scope="row"><?= $i++ ?></td>
                <td><?= get_table_info($loan->user_type , $loan->user_id)->name?></td>
                <td><?= $loan->amunt ?></td>
                <td>
                    <?php if ($loan->status == 0) : ?>
                    <span class="btn btn-sm btn-warning">قيد التصديق</span>
                    <?php elseif ($loan->status == 1) : ?>
                    <?php if ($loan->pay == 0) : ?>
                    <span class="btn btn-sm btn-success">
					<i class="fas fa-value-absolute    "></i>
					 صرف</span>

                    <?php elseif ($loan->pay == 1) : ?>
                    <span class="btn btn-sm btn-success"> تم الصرف</span>
					
                    <?php endif;?>

                    <?php elseif ($loan->status == 2) : ?>

                    <span class="btn btn-sm btn-danger"> مرفوض</span>

                    <?php endif;?>


                </td>
                <td><?= $loan->created_at ?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
