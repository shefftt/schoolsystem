
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>index.php/purchases">المشتريات</a></li>
		<li class="breadcrumb-item"><a href="<?= base_url() ?>index.php/purchases/suppliers">الموردين </a></li>
		<li class="breadcrumb-item active" aria-current="page">اضافة مورد</li>
	</ol>
</nav>

<div class="container mt-5">
	<form action="<?= base_url() ?>index.php/purchases/supplier_add_post" method="post">
		<div class="row">

			<div class="form-group col-md-6">
				<label for="">اسم المورد</label>
				<input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
			</div>
			<div class="form-group col-md-6">
				<label for="">اسم المورد</label>
				<input type="text" class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="">
			</div>
			<div class="form-group col-md-6">
				<input name="" id="" class="btn btn-primary" type="submit" value="اضافة">
			</div>
		</div>
	</form>
</div>
