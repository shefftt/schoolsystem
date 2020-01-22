<table class="table table-bordered  ">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>الاجمالى</th>
            <th>التاريخ</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($revenue as $r) : ?>
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $r->amount ?></td>
            <td><?= $r->day ?></td>
            <td>
			<a  class="btn btn-primary btn-sm" href="<?= base_url() ?>index.php/admin/revenue/<?= $r->day ?>" role="button">التفاصيل</a>
			</td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>
