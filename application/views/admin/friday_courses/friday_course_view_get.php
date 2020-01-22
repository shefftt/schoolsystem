<div class="container mt-5">


    <table class="table table-border">
        <thead>
            <tr>
                <th>#</th>
                <th>الزمن</th>
                <th>التاريخ</th>
                <th>اسم المدرب</th>
                <th>اسم المتدرب</th>
                <th>الكورس</th>
                <th>الموظف</th>
                <th>التاريخ</th>
                <th>اعدادات</th>
            </tr>
        </thead>
        <tbody>
            <!-- trainees_course_friday `trainee_id`, `trainer_id`, `price`, `created_at`, `course_id`, `emplyee_id`, `school_id`, `class_time`, `class_date` -->
            <?php $i = 1; foreach ($trainees_course_friday as $course_friday) : ?>
            <tr>
                <td scope="row"><?= $i++ ?></td>
                <td><?= $course_friday->class_time ?></td>
                <td><?= $course_friday->class_date ?></td>
                <td><?= get_table_info('trainers' , $course_friday->trainer_id)->name ?></td>
                <td><?= get_table_info('trainers' , $course_friday->trainee_id)->name ?></td>

                <td><?= get_table_info('friday_courses' , $course_friday->course_id)->name ?></td>
                <td><?= get_table_info('users' , $course_friday->emplyee_id)->name ?></td>
                <td><?= $course_friday->created_at ?></td>
                <td class="w-10">
                    <?php if ($course_friday->status == 0) : ?>
                    <a href="#" class="btn btn-sm btn-warning ">تحويل</a>
                    <a href="<?= base_url() ?>index.php/admin/course_friday_status/<?= $course_friday->id?>"
                        class="btn btn-sm btn-primary ">تم التدريس</a>
                    <a href="#" class="btn btn-sm btn-danger ">الغاء</a>
                    <?php elseif($course_friday->status == 2): ?>
					<h3>تم التدريس</h3>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach  ?>
        </tbody>
    </table>

</div>
