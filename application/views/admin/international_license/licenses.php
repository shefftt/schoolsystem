<div class="card mt-5 container">
	<div class="card-title p-3	">عرض الرخص الدوليه</div>
	<table class="table table-bordered">
		<thead>
			<th>#</th>
			<th>الاسم</th>
			<th>القيمه</th>
			<th>المبلغ المدفوع</th>
			<th> المتبقى</th>
			<th>التاريخ</th>
		</thead>
		<tbody>
			<?php $i = 1; foreach ($licenses as $license) : ?>
			<tr>
				<td><?= $i++ ?></td>
				<td><?= $license->name ?></td>
				<td><?= $license->price ?></td>
				<td><?= $license->pay ?></td>
				<td><?= $license->price - $license->pay ?></td>
				<td><?= $license->created_at ?></td>
			</tr>
		<?php $i++; endforeach; ?>
		</tbody>
	</table>
</div>
