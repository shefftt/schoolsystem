<div class="row m-4">
    <div class="col-md-12">
	<a  class="btn btn-primary" href="<?= base_url() ?>index.php/admin/add_stock" role="button">اضافة منتج</a>
	</div>
</div>

<div class="col-md-12">
	
<table class="table table-striped table-inverse">
	<thead class="thead-inverse">
		<tr>
			<th>#</th>
			<th>المنتج</th>
			<th>الرصيد</th>
		</tr>
		</thead>
		<tbody>
		<?php $i = 1; foreach ($stock_prodcts as $prodct): ?>
			<tr>
				<td scope="row"><?= $i++ ?></td>
				<td><?= $prodct->name ?></td>
				<td></td>
			</tr>
			
			<?php endforeach; ?>
		</tbody>
</table>

</div>
