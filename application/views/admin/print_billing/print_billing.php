<div style="height: max-content;"  id="printableArea">
<center>
	<h2>اكاديميه جدو لتعليم القياده</h2>
	<hr>
	<h3> الرقم : #<?=  $trainees_course->id ?> </h3> 
	<h3>ايصال كورس : <?= $course ?> </h3> 
	<h3>اسم المتدرب   : 	<?= $trainee->name ?></h3> 
	<h3> رقم الهاتف   : 	<?= $trainee->phone ?></h3> 
	<h3>  سعر الكورس   : 	<?= $trainees_course->price ?></h3> 
	<h3>   المدفوع   : 	<?= $trainees_course->paid ?></h3> 
	<h3>   المتبقى   : 	<?= $trainees_course->price -  $trainees_course->paid ?></h3> 
	<h3>اسم  المحاسب   : 	<?= $emplyee ?></h3> 
	
	<h3>توقيت    : 	<?= date('Y-m-d H:i:s') ?></h3> 
</center>
<!-- trainees_course `trainee_id`, `trainer_id`, `price`, `start_date`, `end_date`, ``, `course_id`, `payment_status`, ``, `emplyee_id`, `paid`, `school_id` -->

</div>

<input type="button" onclick="printDiv('printableArea')" value="" />

<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

