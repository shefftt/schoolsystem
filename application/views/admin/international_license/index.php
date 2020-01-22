<div class="container">
    <div class="card mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title"><?= $qyt ?> : الرخصه الدوليه</h4>
                </div>
                <div class="col-md-6">
                    <form action="<?= base_url() ?>index.php/admin/international_license_log_post" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="qyt" placeholder="كميه جديد">
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-info">اضافة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>

     

       

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">الرخصه الدوليه</h4>
                    <table class="table   table-border" id="myTable">
                        <thead class="thead-inverse">
                            <tr>
                                <th>الكميه</th>
                                <th>التاريخ</th>
                                <th>اعددات</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        <?php $i = 1; foreach ($international_license_log as $license): ?>
                        <tr>
                            <td><?=  $license->qyt; ?></td>
                            <td><?=  $license->created_at; ?></td>
                            <td>
								<a name="" id="" class="btn-sm btn-info	" href="#" role="button">تعديل</a>
							</td>
                            <td></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
