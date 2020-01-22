<div class="container">
    <br>
    <br>
    <a class="btn btn-primary btn-sm" href="<?= base_url() ?>index.php/admin/bank_add" role="button">ايداع</a>
    <table class="table table-bordered">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>البنك </th>
                <th>الحساب</th>
                <th>الرصيد</th>
                <th>التفاصيل</th>
            </tr>
        </thead>
        <tbody>
            <!-- banks `name`, `account`, `balance` -->
            <?php $i = 1; foreach($banks as $bank) : ?>
            <tr>
                <td scope="row"><?= $i++ ?></td>
                <td><?= $bank->name ?></td>
                <td><?= $bank->account ?></td>
                <td><?= $bank->balance ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="<?= base_url() ?>index.php/admin/bank/<?= $bank->id ?>"
                        role="button">التفاصيل</a>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
