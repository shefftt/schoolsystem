<div class="container">
	
	
<br>
<br>
<center>
<h3>
كشف حساب 
<?= $bank->name ?>
- 
<?= $bank->account ?>

</h3>
</center>
<table class="table table-bordered  ">

	<thead class="thead-inverse">
		<tr>
			<th>#</th>
			<th>المبلغ</th>
			<th>نوع العمليه </th>
			<th>الموظف</th>
			<th>التاريخ</th>
		</tr>
		</thead>
		<tbody>
		<!-- banks `name`, `account`, `balance` -->
				<!-- // bank_log `id`, `amount`, `transaction`, `bank_id`, `user_id`, `created_at` -->
		<?php $i = 1; foreach($bank_log as $b) : ?>
                    <tr>
                        <td scope="row"><?= $i++ ?></td>
                        <td><?= $b->balance ?></td>
                        <td><?= $b->transaction ?></td>
                        <td><?=user_info($b->user_id)->name?></td>
                        <td><?= $b->created_at ?></td>
                      
						
                    </tr>
                    <?php endforeach; ?>
		</tbody>
</table>

<h3>
الرصيد الحالى

<?= $bank->balance ?>

</h3>

</div>
