<div class="container mt-4">

<form action="<?= base_url() ?>index.php/admin/certificates_post" method="post">
	<div class="card">
		<div class="card-title">
				<center>
					<h2>ادخال بيانت استخراج شهاده</h2>
				</center>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label>اسم المتدرب</label>
					<input type="text" class="form-control" name="name">
				</div>
				<div class="form-group col-md-6">
					<label>رقم الهاتف</label>
					<input type="text" class="form-control" name="phone">
				</div>
				<div class="form-group col-md-6">
					<label>الجنس</label>
					<select name="gender" class="form-control">
						<option value="male">ذكر</option>
						<option value="female">انثى</option>
					</select>
				</div>

			

			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<button name="license" type="submit" value="license_1" class="btn btn-success">ملاكي</button>
					<button name="license" type="submit" value="license_2" class="btn btn-primary">عامه</button>
				</div>
			</div>
		</div>
	</div>
</form>
</div>