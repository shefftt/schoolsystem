<div class="card m-2">

  <div class="card-body">
  <div class="card-header ">
            <div class="row pt-1">
                <div class="form-group">
                    <h4 class="card-title">الحسابات</h4>
                </div>
                <div class="form-group ml-auto">

                    <button type="button" class="btn btn-primary left" data-toggle="modal" data-target="#myModal">اضافة بند</button>
                </div>
            </div>
	<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>الحساب</th>
            <th>المنصرف</th>
        </tr>
    </thead>
    <tbody>
        <?php $i= 1; foreach ($accounts as  $account) : ?>
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?=  $account->name ?></td>
            <td><?= accounts_log_sum($account->id) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

  </div>
</div>



<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url() ?>index.php/admin/account_add_post" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">بند الصرف</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">اسم الحساب</label>
                        <input type="text" require class="form-control" name="name" id="" aria-describedby="helpId"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">الحساب الاب</label>
						  <select class="form-control" name="sub_id" id="">
							<option value="0">حساب رئسيى</option>
							<?php foreach($accounts as $account) : ?>
							<option value="<?= $account->id ?>"><?= $account->name ?></option>
						<?php endforeach; ?>
						  </select>
						</div>
						
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-success">اضافة</button>
                </div>
            </form>
        </div>
    </div>
</div>
