<div class="container mt-2">
	<div class="card text-left">
		<div class="card-body">

			<h4 class="card-title">الرئسيه</h4>
			<h6 class="card-subtitle text-muted">الاشعارات</h6>
			<hr>
			<div class="row">
				<div class="item col-md-2 item_m">
					<?php if (sizeof($loans) > 0) : ?>
						<span class="item_bandage"> <?= $loans ?> </span>
					<?php endif; ?>
					<center>
						<a class="item_a" href="<?= base_url() ?>index.php/purchases/suppliers">
							<img style="width: 32px;" src="<?= base_url() ?>icons/Purchases/suppliers.png"><br>
							<span>السلفيات</span>
						</a>
					</center>
				</div>

				<div class="item col-md-2 item_m">
					<center>
						<a class="item_a" href="#">
							<img style="width: 32px;" src="<?= base_url() ?>icons/Purchases/add_user.png"><br>
							<span>التصاديق</span>
						</a>
					</center>
				</div>

				<div class="item col-md-2 item_m">
					<center>
						<a class="item_a" href="#">
							<img style="width: 32px;" src="<?= base_url() ?>icons/Purchases/purchase_order.png"><br>
							<span>الفواتير</span>
						</a>
					</center>
				</div>

				<div class="item col-md-2 item_m">
					<center>
						<a class="item_a" href="#">
							<img style="width: 32px;" src="<?= base_url() ?>icons/Purchases/add_rule.png"><br>
							<span>انشاء فاتوره</span>
						</a>
					</center>
				</div>
			</div>
			<hr>


			<h4 class="card-title">الرئسيه</h4>
			<h6 class="card-subtitle text-muted">البرامج</h6>
			<hr>
			<div class="row">
				<div class="item col-md-2 item_m">
					<?php if (sizeof($loans) > 0) : ?>
						<span class="item_bandage"> <?= $loans ?> </span>
					<?php endif; ?>
					<center>
						<a class="item_a" href="<?= base_url() ?>index.php/purchases/suppliers">
							<img style="width: 32px;" src="<?= base_url() ?>icons/Purchases/suppliers.png"><br>
							<span>الحسابات</span>
						</a>
					</center>
				</div>
				<div class="item col-md-2 item_m">
					<?php if (sizeof($loans) > 0) : ?>
						<span class="item_bandage"> <?= $loans ?> </span>
					<?php endif; ?>
					<center>
						<a class="item_a" href="<?= base_url() ?>index.php/purchases/suppliers">
							<img style="width: 32px;" src="<?= base_url() ?>icons/Purchases/suppliers.png"><br>
							<span>المتدربين</span>
						</a>
					</center>
				</div>
				<div class="item col-md-2 item_m">
					<?php if (sizeof($loans) > 0) : ?>
						<span class="item_bandage"> <?= $loans ?> </span>
					<?php endif; ?>
					<center>
						<a class="item_a" href="<?= base_url() ?>index.php/purchases/suppliers">
							<img style="width: 32px;" src="<?= base_url() ?>icons/Purchases/light_on_20px.png"><br>
							<span>المدربين</span>
						</a>
					</center>
				</div>
				<div class="item col-md-2 item_m">
					<?php if (sizeof($loans) > 0) : ?>
						<span class="item_bandage"> <?= $loans ?> </span>
					<?php endif; ?>
					<center>
						<a class="item_a" href="<?= base_url() ?>index.php/purchases/suppliers">
							<img style="width: 32px;" src="<?= base_url() ?>icons/Purchases/suppliers.png"><br>
							<span>الحصص والجداول</span>
						</a>
					</center>
				</div>
				<div class="item col-md-2 item_m">
					<?php if (sizeof($loans) > 0) : ?>
						<span class="item_bandage"> <?= $loans ?> </span>
					<?php endif; ?>
					<center>
						<a class="item_a" href="<?= base_url() ?>index.php/purchases/suppliers">
							<img style="width: 32px;" src="<?= base_url() ?>icons/Purchases/suppliers.png"><br>
							<span>السيارات</span>
						</a>
					</center>
				</div>
			</div>
		</div>
	</div>

</div>
