<div class="container mt-5">
<a name="" id="" class="btn btn-primary" href="<?= base_url() ?>index.php/admin/friday_course_view" role="button">عرض جدول الجمع</a>

    <form action="<?= base_url() ?>index.php/admin/friday_courses_post" method="post">
        <div class="col-md-12">
            <h3>بيانات المتدرب</h3>
            <hr>

            <div class="row">

                <div class="form-group col-md-6">
                    <label for="">اسم المتدرب</label>
                    <input type="text" class="form-control" name="name" placeholder="">
                </div>

                <div class="form-group col-md-6">
                    <label for="">رقم المتدرب</label>
                    <input type="text" class="form-control" name="phone" placeholder="">
                </div>

                <div class="form-group col-md-6">
                    <label for="">الجنس</label>
                    <select class="form-control" name="id" id="">
                        <option value="">ذكر</option>
                        <option value="">انثى</option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">السكن</label>
                    <select class="form-control" name="address" id="">
                        <option >ام درمان</option>
                        <option >الحروطوم </option>
                        <option >شرق النيل </option>
                        <option >بحري </option>

                    </select>
                </div>
            </div>

            <br>
            <br>
            <h3>بيانات الكورس</h3>
            <hr>

            <div class="row">

                <div class="form-group col-md-6">
                    <label for="">تاريخ الكورس</label>
                    <span style="color: red;font-size: 10px;font-style: normal;">الرجاء اختيار الجمعه فقط</span>
                    <input type="date" class="form-control" name="class_date">
                </div>
                <div class="form-group col-md-6">
                    <label for="">نوع الكورس</label>
                    <select class="form-control" name="course_id">
                        <?php foreach (friday_courses() as  $courses):  ?>
                        <option value="<?= $courses->id ?>"><?= $courses->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for=""> المبلغ المدفوع</label>
                    <input type="text" class="form-control" name="amount">
                </div>
                <div class="form-group col-md-6">
                    <label for="">VIP / normal</label>
                    <select class="form-control" name="id" id="">
                        <option value="">عادى</option>
                        <option value="">vip</option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">زمن الكورس</label>
                    <select class="form-control" name="class_time">
                        <option value="6_10">6 - 10</option>
                        <option value="10_2">10 - 2</option>
                        <option value="2_6">2 - 6</option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">المدرب</label>
                    <select class="form-control" name="trainer_id">
                        <option value="1">احمد حمد </option>

                    </select>
                </div>
            </div>
			<div class="row">
			<button  class="btn btn-primary" >اضافة</button>
			</div>
        </div>

    </form>

</div>
