<div class="container mt-5">
    <br>
	<center>
	
	<h2>تفاصيل مرتبات شهر <?= $payrolls->month ?></h2>
	</center>
    <br>
	<?php if ($this->session->flashdata('error_message')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?= $this->session->flashdata('error_message'); ?></strong>
    </div>
    <?php endif; ?>


        <table class="table table-bordered ">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>

                    <th class="red">المرتب</th>



                    <th>سلفيات</th>
                    <th>غياب</th>
                    <th>جزاء</th>
                    <th>جمله</th>
                    <th>الحاله</th>


                    <th>الصافى المستحق</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($payroll_details as $payroll): ?>
                <tr>
                    <td scope="row"><?= $i++ ?></td>
                    <td> <?=  user_info($payroll->employee_id)->name ?></td>
                    <td> <?=  $payroll->salary ?></td>
                   

                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
					<td>
                        <?php if($payroll->status == 0 ) :?>
						<a name="" id="" class="btn btn-sm btn-primary" href="<?= base_url() ?>index.php/admin/payroll_details_update/<?= $payroll->id ?>" role="button">صرف</a>
                        <?php else: ?>
						<p class="btn btn-sm btn-success">تم الصرف</p>
                        <?php endif; ?>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
		
</div>
