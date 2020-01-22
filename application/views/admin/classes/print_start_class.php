<center>
	<h2>اكاديميه جدو لتعليم القياده</h2>
	<hr>
	<h3>اذن خروج حصه تدريبه للزمن  <?= $classes->class_time ?>:00</h3> 
	<h3>االتاريح   <?= $classes->class_date ?></h3> 
	<h3>اسم المدرب   : 	<?= $trainer ?></h3> 
	<h3>اسم  المتدرب   : 	<?= $trainee ?></h3> 
	<h3>الحصص المتبقيه   : 	<?= remaining_class($classes->trainees_course_id) ?></h3> 
	<h3>المبلغ المتبقى    : 	<?= remaining_balance($classes->trainees_course_id)['remaining'] ?></h3> 
	<h3>توقيت التزكره   : 	<?= date('H:i:s') ?></h3> 
</center>
