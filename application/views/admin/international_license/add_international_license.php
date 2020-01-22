<div class="card mt-5">
	<div class="card-header">
		<h3>الرخصه الدوليه </h3>
	</div>
	<div class="card-body">
		<?php if ($qyt < 10) : ?>
			<center>
				<h1 class="bg-danger p-3 rounded" style="color: #FFF; font-weight: 700">
				عفوا الرصيد 
				<span style="color: #000; background-color: #FFF; padding:  0px 5px; border: 1px solid #e74c3c"> <?= $qyt ?></span>
				 الرجاء تبليغ الاداره 	
			</h1>
			</center>
		<?php endif; ?>
		<form action="<?= base_url() ?>index.php/admin/add_international_license_post" method="post">
			
		<div class="row">
			<div class="form-group col-md-4">
				<label>اسم صاحب الرصخه</label>
				<input  required="true"  type="text" class="form-control" name="name">
			</div>
			<div class="form-group col-md-4">
				<label>رقم الهاتف</label>
				<input required="true" type="text" class="form-control" name="phone">
			</div>
			<div class="form-group col-md-4">
				<label>المبلغ</label>
				<input required="true" type="text" class="form-control" name="pay">
			</div>
		

		</div>
		<div class="row">
			<button class="btn btn-md btn-success">ارسال</button>
		</div>
		</form>
		

	</div>
</div>
