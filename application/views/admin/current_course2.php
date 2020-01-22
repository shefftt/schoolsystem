<div class="col-md-12">
    <?php if ($this->session->flashdata('success_message')) : ?>
    <center>

        <p id="demo"></p>
    </center>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?= $this->session->flashdata('success_message'); ?></strong>
    </div>
    <?php endif; ?>
    <div class="card m-4">
        <div class="card-title p-2">
            <center>
                <h2> حصص الساعه 00 : <?= $class_time ?></h2>
            </center>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المتدرب</th>
                        <th>اسم الكورس</th>
                        <th>رقم المتدرب</th>
                        <th>اسم الاستاذ</th>
                        <th>خروج الحصه</th>
                        <th>حاله الدفع</th>
                    </tr>
                </thead>
                <!-- classes `trainees_course_id`, `class_date`, `class_time`, `trainer_id`, `stratus`, `color_style` -->
                <tbody>
                    <?php $i = 1 ; foreach ($classes as $classe): ?>
				
                    <tr>
                        <td><?= $i++?></td>
                        <td><a href="<?= base_url() ?>index.php/admin/trainee/<?= get_trainee_info($classe->trainees_course_id)->id ?>"><?= get_trainee_info($classe->trainees_course_id)->name ?></a></td>
                        <td><?= courses($classe->trainees_course_id)->name ?></td>
                        <td><?= get_trainee_info($classe->trainees_course_id)->phone ?></td>
                        <td><?= get_trainer_info($classe->trainer_id)->name ?></td>
                        <td>
                            <!-- <a target="_blank" href="<?= base_url() ?>index.php/admin/start_class_post/<?= $classe->id ?>"
                                class="btn btn-sx btn-success">بداء الحصه</a> -->
							<button  onclick="play()"  class="btn btn-sx btn-success">بداء الحصه
							</button>
							<audio id="audio" src="<?= base_url()?>sound/su.mp4" ></audio>
                            <a href="#" class="btn btn-sx btn-warning">غياب</a>
							<script>
  function play(){
       var audio = document.getElementById("audio");
       audio.play();
                 }
   </script>
                        </td>
                        
                        <td>
                            <?php if (class_balance($classe->trainees_course_id) == 1) : ?>
                            <button type="button" class="btn btn-success btn-elevate btn-circle btn-icon"><i
                                    class="flaticon2-check-mark"></i></button>
                            <?php else: ?>
                            <button type="button" class="btn btn-danger btn-elevate btn-circle btn-icon"><i
                                    class="flaticon2-cancel-music"></i></button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <script>
    var myVar = setInterval(myTimer, 1000);
    window.addEventListener('load', function myTimer() {
        var d = new Date();
        document.getElementById("demo").innerHTML = d.toLocaleTimeString();
    }, false)
    </script>
