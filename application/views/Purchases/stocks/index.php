<div class="container  mt-5">
	<a name="" id="" class="btn btn-primary" href="<?= base_url() ?>index.php/purchases/stock_add" role="button">
		<i class="fa fa-plus-circle"></i>		اضافة</a>
	<br>
	<br>
	<table class="table table-bordered">
		<thead class="thead-default">
			<tr>
				<th>#</th>
				<th>الاسم</th>
				<th>رقم الهاتف</th>
				<th>اعدادات</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1;
			foreach ($stocks as $stock) : ?>
				<tr>
					<td scope="row"><?= $i++ ?></td>
					<td><?= $stock->name ?></td>
					<td><?= $stock->name ?></td>
					<td>
						<a name="" id="" class="btn btn-sm btn-success" href="<?= base_url()?>index.php/purchases/stock/<?= $stock->id ?>" role="button"><i class="fa fa-eye"></i>عرض</a>
						<a name="" id="" class="btn btn-sm btn-warning hidden-md-down" href="#" role="button"><i class="fa fa-edit"></i>تعديل</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>
