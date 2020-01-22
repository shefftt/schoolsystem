<div class="container mt-5">
    <div class="card border-primary">
        <div class="card-header">
            <h4 class="card-title">عرض ايراد يوم - <?= $day ?></h4>

        </div>
        <div class="card-body">
            <table class="table table-bordered table-inverse">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>الجهه</th>
                        <th>الايرد</th>
                        <th>ملاحظه</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($revenue as $r) : ?>
                    <tr>
                        <td scope="row"><?= $i++ ?></td>
                        <td><?= $r->department ?></td>
                        <td><?= $r->amount ?></td>
                        <td><?= $r->note ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
