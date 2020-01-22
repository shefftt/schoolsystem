<div class="container mt-5">
    <br>
    <br>
    <form action="<?= base_url() ?>index.php/admin/payroll_post" method="post">
        <h2>مرتبات شهر <?= $month ?></h2>

        <input type="hidden" name="month" value="<?= $month ?>">


        <table class="table table-bordered ">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الجهه</th>

                    <th class="red">المرتب</th>



                    <th>سلفيات</th>
                    <th>غياب</th>
                    <th>جزاء</th>
                    <th>جمله</th>


                    <th>الصافى المستحق</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($users as $user): ?>
                <tr>
                    <td scope="row"><?= $i++ ?></td>
                    <td>

                        <input type="hidden" name="employee_id[]" value="<?= $user->id ?>">

                        <?=  $user->name ?></td>
                    <td>
                        <?php if($user->school_id > 0 ) :?>
                        <?= get_school_info($user->school_id)->name ?>
                        <?php else: ?>
                        <?= $user->school_id ?>
                        <?php endif; ?>

                    </td>
                    <td>

                        <input type="text" class="form-control" name="salary[]" value="<?=  $user->salary ?>">

                    </td>

                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="form-group">
            <label for="">ملاحظات</label>
            <textarea class="form-control" name="note" id="" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">ارسال</button>
    </form>
</div>
