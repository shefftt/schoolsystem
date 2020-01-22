<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>جدول</title>
</head>

<body>
    <div style="text-align: -moz-center;text-align:  -webkit-center"> 
    <div style="overflow: hidden;width: 100%;"> 
        <h4> اكاديميه جدو لتعلم قياده السيارات </h4>
        <h4>المتدرب : <?= get_table_info("trainees" , $course->trainee_id)->name ?> - <b>بواسطه</b> :
            <?= get_table_info("users" , $course->emplyee_id)->name ?></h4>
			<h4>المدرب :   <?= get_table_info("trainers" , $classes[0]->trainer_id)->name ?> </h4>






        <br>

        <div style="float: right; width: 30%;">
		
            <table border="1" width="100%">
                <tr>
                    <td>#</td>
                    <td>التاريخ</td>
                    <td>الساعه</td>
                </tr>
                <?php $i = 1; foreach ($classes as  $class) : ?>
                <?php if ($class->stratus == 0 ): ?>
                <tr>
                    <td scope="row"><?= $i++ ?></td>
                    <td>

                        <?= $class->class_date ?></td>
                    <td>
					<?php if ( $class->class_time > 12) : ?> PM - 
					 <?= $class->class_time - 12 ?> : 00
<?php else: ?> AM - 
 <?= $class->class_time  ?> : 00


<?php endif; ?>
					</td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
            </table>

            
        </div>


        <div style="float: left; width: 68%;">
		
		<h4>
        تاريخ الطباعه <?= date("Y-m-d H:i:s") ?></h4>
        <h4> <?= get_table_info("courses" , $course->course_id)->name  ?> </h4>


		<table border="1" width="100%">
                <tbody>
                    <tr>
                        <td> سعر الدوره : <?= $course->price?></td>
                        <td> المدفوع : <?= remaining_balance($course->id)['sum']?></td>
                        <td> المتبقى : <?= remaining_balance($course->id)['remaining'] ?></td>
                    </tr>
                </tbody>
            </table>
            <div align="right">
                <h2>قواعد عامه</h2>
				<ul class="style3" dir="rtl">
<li><span style="text-decoration: underline;"><strong>المبلغ المدفوع لايسترد</strong> </span>-لا يتم الذهاب للحصة في حالة دفع جزء من مبلغ الدورة مالم يتم سداد المبلغ كاملا</li>
<li>في حالة غياب المدرب يتم استبداله بمدرب اخر</li>
<li>في حالة غياب المتدرب يتم حساب الحصة كاملة - <span style="text-decoration: underline;"><strong>على المتدرب احضار أورنيك استخراج الرخصة بدءا من الحصة الثانية</strong></span></li>
<li>يمكن تحويل الحصة في حالة استئذان المتدرب قبل 24 من زمن الحصة -رسوم الشهادات 100 جنيه</li>
<li><span style="text-decoration: underline;"><strong>محاضرة النظري يوم السبت أو الثلاثاء من كل اسبوع الساعة 11 صباحا - يمنع اصطحاب الاطفال</strong></span></li>
<li>تنبيه:نرجو من المتدرب ممارسة القيادة بشكل متكرر مابعد الكورس في حالة عدم التمكن نرجو التكرم بالرجوع للأكاديمية لعمل حصتين على الاقل- انتعاشية -</li>
<li>توجد دورات انتعاشية مابعد استخراج الرخصة - <span style="text-decoration: underline;"><strong>فترة التجميد أقصاها 3 اشهر والا تسقط الحصة</strong></span></li>
<li>للإستفسار والمتابعة : 0911116666 - 0911116660 - 0187566666 - 0996044444</li>
<li><strong>في حالة التأجيل أو التجميد ولم يتم الرد علي الهاتف نرجو إرسالة رسالة نصية أو عبر الواتساب علي الرقم</strong> <span style="text-decoration: underline;"><strong>0911116666</strong> </span>بزمن و تاريخ الحصة و اسم المتدرب واسم المدرب .</li>
<li>لايمكن تقليل الكورس بعد الاختيار</li>
</ul>
</div>
        </div>

    </div>
    </div>
</body>

</html>
