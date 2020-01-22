<div class="container mt-2">

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">جميع المتدربين</h4>
            <table class="table   table-border" id="myTable">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>اسم المتدرب</th>
                        <th>رقم الهاتف</th>
                        <th>العنوان</th>
                        <th>ضبط</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($trainees as $trainee) : ?>
                    <tr>
                        <td scope="row"><?= $i++ ?></td>
                        <td><?=  $trainee->name ?></td>
                        <td><?=  $trainee->phone ?></td>
                        <td><?=  $trainee->address ?></td>
                        <td>
                            <a class="btn btn-sm btn-success" href="<?= base_url() ?>index.php/admin/trainee/<?= $trainee->id ?> ">عرض</a>
                            <a class="btn btn-sm btn-danger" href="<?= base_url() ?>index.php/admin/class_add/<?= $trainee->id ?>">اضافة كورس</a>
                            <a class="btn btn-sm btn-danger" href="<?= base_url() ?>index.php/admin/trainee_edit/<?= $trainee->id ?>">تعديل</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
