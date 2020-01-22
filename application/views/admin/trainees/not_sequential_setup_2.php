<?php

$class = "";
 $tody = new DateTime(date("Y-m-d"));
 $tody->modify('-1 day')
 
 ?>
<form action="<?= base_url() ?>index.php/admin/not_sequential_setup_post" method="post">
    <input type="hidden" name="trainer_id" value="<?= $trainer_id ?>">
    <input type="hidden" name="course_id" value="<?= $course_id ?>">
    <input type="hidden" id="number_of_dayes" name="number_of_dayes" value="<?= $number_of_dayes ?>">
    <div class="card">
        <div class="card-body row" id="demo">

        </div>
        <div class="form-group">
            <button class="btn btn-info">اضافه</button>
        </div>
    </div>
</form>
<table class="table table-border">
    <thead>
        <tr>
            <th>التاريخ</th>
            <?php for ($i=6; $i < 19; $i++) :?>
            <th><?= $i ?></th>
            <?php endfor;?>
        </tr>
    </thead>
    <tbody>
        <?php while ($tody->format('Y-m-d') <= $end_date) { $tody->modify('+1 day') ?>
        <tr>
            <td scope="row" d><?= $tody->format('Y-m-d') ?></td>
            <?php for ($i=6; $i < 19; $i++) :?>
            <?php  get_class_info($tody->format('Y-m-d') , $i , $trainer_id) ? $class = "btn-danger" :  $class = "btn-success" ;?>
            <td class="bg-geen">

                <center>
                    <?php  if(get_class_info($tody->format('Y-m-d') , $i , $trainer_id) == 0) :?>
                    <div id="<?= $tody->format('Y-m-d')?>_<?= $i?>">
                        <p onclick="myFunction('<?= $tody->format('Y-m-d')?>' ,<?= $i?>  )" class="<?= $class ?>">
                        <span><?= $i ?></span>
                        
                        </p>
                    </div>
                    <?php  else:?>
                    <p class="<?= $class ?>">
                        -
                    </p>
                    <?php  endif;?>


                </center>
            </td>
            <?php endfor;?>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script>
var number = document.getElementById("number_of_dayes").value;
var number_of_dayes = document.getElementById("number_of_dayes").value;

function myFunction(class_date, class_time) {
    document.getElementById(class_date + "_" + class_time).innerHTML  = "<p class=' bg-primary'>تم الاختيار</p>";
    if (number_of_dayes > 0) {

        document.body.style.color = "purple";
        var demo = ` <div class="col-md-3">
						<div class="form-group">
							<div class="row">
								<div class="col-md-8">
									<input type="date" class="form-control" name="class_date[]" value="` + class_date + `">

								</div>
								<div class="col-md-4">
									<input type="text" class="form-control" name="class_time[]" value="` + class_time + `">
								</div>
							</div>
						</div>
					</div>`;
        $("#demo").append(demo);
        number_of_dayes--;
    } else {

        alert("عفوا لايمكنك اختيار اكثر من" + number);
    }

}
</script>
