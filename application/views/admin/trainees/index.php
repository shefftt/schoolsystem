<div class="container mt-4">
	<h3> كورسات الطالب : <?= $trainee->name ?></h3>
	<table class="table table-border">
		<thead>
			<tr>
				<th>#</th>
				<th>تاريخ التسجيل</th>
				<th>سعر الدوره</th>
				<th>المبلغ المدفوع</th>
				<th>المبلغ المتبقى</th>
				<th>المتبقى بالايام</th>
				<th> الخصم</th>
				<th>اسم المدرب</th>
				<th>اسم الدورة</th>
				<th> الحاله</th>
				<th>عرض</th>

			</tr>
		</thead>
		<tbody>
			<?php $i = 1;
							foreach ($trainees_course as $course) : ?>
				<!-- trainees_course `trainee_id`, `trainer_id`, `price`, `start_date`, ``, ``, `course_id`, `number_of_days` -->
				<tr>
					<td scope="row"><?= $i++ ?></td>
					<td><?= date_format(date_create($course->created_at), "Y-m-d"); ?></td>
					<td><?= $course->price ?></td>
					<td><?= remaining_balance($course->id)['sum'] ?></td>
					<td><?= remaining_balance($course->id)['remaining'] ?></td>

					<td><?php remaining_class($course->id) ?></td>
					<td><?php if (isset(get_table_info("trainers", $course->course_id)->name)) {
										echo get_table_info("trainers", $course->course_id)->name;
									} ?></td>
					<td><?= get_table_info("courses", $course->course_id)->name ?></td>
					<td>
						<a class="btn btn-sm btn-info" href="<?= base_url() ?>index.php/admin/trainee/<?= $course->trainee_id ?>/<?= $course->id ?>">عرض</a>
					</td>
					<td>
						<?php if ($course->payment_status == 1) : ?>
							<p class="btn btn-sm btn-danger">متوقف</p>
						<?php else : ?>
							<a href="<?= base_url() ?>index.php/admin/payment_status/<?= $course->id ?>" class="btn btn-sm btn-success">نشطه</a>
						<?php endif; ?>
					</td>
					<td>
						<?php if ($course->payment_status == 0) : ?>
							<form action="<?= base_url() ?>index.php/admin/trainees_payments" method="post">
								<div class="row">
									<div class="col-md-6 mt-2">
										<div class="form-group">
											<label for="">طريقه الدفع</label>
											<select class="form-control" name="bank_account" id="">
												<option value="0">كاش</option>
												<?php $i = 1; foreach ($banks as $bank) : ?>
													<option value="<?= $bank->id ?>"><?= $bank->name ?> <?= $bank->account ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<input type="hidden" name="course_id" value="<?= $course->id ?>">
									<div class="form-group col-md-9">
										<input type="text" name="amount" class="form-control" placeholder="المبلغ">
										<input type="hidden" name="type" value="0">
									</div>
									<div class="form-group col-md-3">
										<button class="btn btn-info btn-sm">سداد</button>
									</div>
								</div>
							</form>
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>
