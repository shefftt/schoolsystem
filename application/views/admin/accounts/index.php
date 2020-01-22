<div class="card m-2">
<?php if ($this->session->flashdata('error_message')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?= $this->session->flashdata('error_message'); ?></strong>
    </div>
    <?php endif; ?>

	<?php if ($this->session->flashdata('success_message')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?= $this->session->flashdata('success_message'); ?></strong>
    </div>
    <?php endif; ?>

    <script>
    $(".alert").alert();
    </script>
    <div class="card-body">
        <div class="card-header ">
            <div class="row pt-1">
                <div class="form-group">
                    <h4 class="card-title">تفاصيل حساب : <?= $account_name ?></h4>
                </div>
                <div class="form-group ml-auto">

                    <button type="button" class="btn btn-primary left" data-toggle="modal" data-target="#myModal">اضافة
                        صرفيه</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>المبلغ</th>
                        <th>البيان</th>
                        <th>التاريخ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i= 1; $sum= 0; foreach ($accounts_log as  $log) : $sum+= $log->amunt;?>
                    <tr>
                        <td scope="row"><?= $i++ ?></td>
                        <td><?=  $log->amunt ?></td>
                        <td><?=  $log->note ?></td>
                        <td><?=  $log->created_at ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
            <div class="card-header">
                <h3>المجموع : <?=  $sum ?></h3>
            </div>
        </div>
    </div>



    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url() ?>index.php/admin/account_log_post" method="post">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">بيانات صرفيه</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">المبلغ</label>
                            <input type="text" require class="form-control" name="amunt" require="true"
                                aria-describedby="helpId" placeholder="">
                            <input type="hidden" require class="form-control" name="accounts_id"
                                value="<?= $account_id ?>">
                        </div>
                        <div class="form-group">
                            <label for="">البيان</label>
                            <textarea name="note" class="form-control" placeholder=""></textarea>
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
