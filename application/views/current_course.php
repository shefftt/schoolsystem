<div class="col-md-12 p-3">
    <div class="card text-left">
        <div class="card-body">
            <h4 class="card-title">دورات - <?= date('yy-m-d')?></h4>
			
            <table class="table table-bordered table-hover ">
                <thead>
                    <tr>
                        <th>اسم المدرب</th>
                        <?php for ($i=6; $i <= 18; $i++) : ?>
                        <th>00 : <?= $i ?> </th>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($trainers as $trainer) : ?>
                    <tr>
                        <td scope="row">
                            <a href="<?= base_url() ?>index.php/admin/trainer/<?= $trainer->id ?>"><?= $trainer->name ?></a>
                        </td>
                        <?php for ($i=6; $i <= 18; $i++) : ?>
                        <th scope="row" 
                           <?php if(!get_current_course_sataus($current_date,$i,$trainer->id)) :?>
                            style="background-color: <?= get_current_course_sataus($current_date,$i,$trainer->id ,true)->color_style ?>; color: #FFF;" <?php else: ?>
                            style="background-color: var(--green); color: #FFF;" <?php endif; ?>>
							<center> 
                                <?php if (get_current_course_sataus($current_date,$i,$trainer->id ,true) and get_current_course_sataus($current_date,$i,$trainer->id ,true)->stratus == 0): ?>
                                <a href="<?php base_url() ?>class_start/<?= get_current_course_sataus($current_date,$i,$trainer->id ,true)->id?>">
                            بداء                     
                            </a>   
                                <?php elseif  (get_current_course_sataus($current_date,$i,$trainer->id ,true) and get_current_course_sataus($current_date,$i,$trainer->id ,true)->id > 0): ?>

                    <a style="color: #FFF;" href="<?= base_url() ?>index.php/admin/trainee/<?= get_trainee_info(get_current_course_sataus($current_date,$i,$trainer->id ,true)->trainees_course_id)->id ?>"><?= get_trainee_info(get_current_course_sataus($current_date,$i,$trainer->id ,true)->trainees_course_id)->name ?></a>              
                            <?php endif; ?>                  
                            </center>
							</th>
                        <?php endfor; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
