<div class="container">

    <br>

    <div class="row">
        <div class="form-group col-md-6">
            <h4>
                الثريه الحاليه

                <b> <?= $pocket ?></b>
                جنيه
            </h4>
        </div> 
        <div class="form-group col-md-6">
            <h4>
                المنصرفات

                <b> <?= $amunt ?></b>
                
            </h4>
        </div>
        <div class="form-group col-md-6">

            <form action="<?= base_url()?>index.php/admin/pocket_post" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">المبلغ</label>
                        <input type="text" name="balance" class="form-control" required="true">
                    </div>
                    <div class="form-group col-md-6">
                        <br>
                        <input type="submit" class="btn btn-md btn-primary" value="اضافه">
                    </div>
                </div>

        </div>
        </form>
    </div>

<hr>

<table class="table table-bordered  ">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>المبلغ</th>
            <th>المسخدم</th>
            <th>التاريخ</th>
            <th>اعددات</th>
        </tr>
    </thead>
    <tbody>
        <!-- pockets `user_id`, `balance`, `name` -->
        <?php $i = 0; foreach ($pockets as $pocket) : ?>
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?=  $pocket->balance ?></td>
            <td><?=  $pocket->name ?></td>
            <td><?=  $pocket->created_at ?></td>
            <td>
			<?php if(date('Y-m-d')  ==  date_format(date_create($pocket->created_at),"Y-m-d")) : ?>
			<a name="" id="" class="btn btn-primary" href="#">تعديل</a>
			<?php else: ?>
			لايمكنك تعديل النثريه
			<?php endif; ?>
			</td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
