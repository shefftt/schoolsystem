<div class="container mt-5">
<!-- users `email`, `password`, `name`, `school_id`, `salary` -->
    <form action="<?= base_url()?>index.php/admin/employee_add_post" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">اسم الموظف</label>
                <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="">الجهه</label>
                <select class="form-control" name="school_id" id="">
                    <option value="1">اكاديميه جدو ام درمان</option>
                    <option value="1">اكاديميه جدو الخرطوم</option>
                    <option>الورشه</option>
                    <option>المغسله</option>
                    <option>التنكر</option>
                </select>
            </div>
        </div>
        <div class="row">
            <h5>بيانات الدخول ان وجدت</h5>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">البريد </label>
                <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="">كلمه السر</label>
                <input type="text" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="row">
            <h5>المرتب </h5>
			<hr>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">المرتب الشهرى </label>
                <input type="text" class="form-control" name="salary" id="" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="">المرتب الاسبوعى </label>
                <input type="text" class="form-control" name="weekly_salary" id="" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="row">
            <input name="" id="" class="btn btn-primary" type="submit" value="اضافه">
        </div>
    </form>
</div>
