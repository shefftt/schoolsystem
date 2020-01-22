<div class="container mt-4">
<h3>اخيتار كورسات الطلاب</h3>
<table class="table table-border">
    <thead>
        <tr>
            <th>#</th>
            <th>اسم المتدرب</th>
            <th>رقم الهاتف</th>
            <th>اسم الدورة</th>
            <th>اختيار</th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($trainees_course as $course): ?>
		<!-- trainees_course `trainee_id`, `trainer_id`, `price`, `start_date`, ``, ``, `course_id`, `number_of_days` -->
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= get_table_info("trainees" , $course->trainee_id)->name ?></td>
            <td><?= get_table_info("trainees" , $course->trainee_id)->phone ?></td>
            <td><?= get_table_info("courses" , $course->course_id)->name ?></td>
            <td>
			<a class="btn btn-sm btn-info" href="<?= base_url() ?>index.php/admin/sieral/<?= $course->id ?>">كورس متسلسل</a>
			<a class="btn btn-sm btn-info" href="<?= base_url() ?>index.php/admin/not_sequential/<?= $course->id ?>">كورس غير متسلسل</a>
			</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>


