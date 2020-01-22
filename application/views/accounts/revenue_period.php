<div class="container mt-2">
	<center>
		<h2>المنصرفات لفتره
			من -
			<?= date_format(date_create($start), "Y-m-d") ?>
			:
			الى
			:

			<?= date_format(date_create($end), "Y-m-d") ?>

		</h2>
	</center>
	<hr>
	<form action="<?= base_url() ?>index.php/Accounts/revenue_period" method="post">
		<input type="date" name="start">
		<input type="date" name="end">
		<input type="submit" name="account">
	</form>
	<table class="table">
		<tbody>
			<tr>
				<th>#</th>
				<th>بند الصرف</th>
				<th>المبلغ</th>
				<th>البيان</th>
				<th>الموظف</th>
				<th>التاريخ</th>
			</tr>
		</tbody>
		<tbody>
			<!-- accounts_log, `amunt`, `note`, `accounts_id`, `created_at` -->
			<?php $i = 1;
			$sum = 0;
			foreach ($accounts_log as $accounts) : $sum += $accounts->amunt ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= account_name($accounts->accounts_id)->name ?></td>
					<td><?= $accounts->amunt ?></td>
					<td><?= $accounts->note ?></td>
					<td><?= $accounts->amunt ?></td>
					<td><?= $accounts->created_at ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<hr>
	<h3>
		المجموع
		:
		<b>
			<?= $sum  ?>
		</b>

	</h3>
</div>
