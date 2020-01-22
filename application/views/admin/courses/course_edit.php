<form action="<?= base_url() ?>index.php/admin/course_edit_post" method="post">
    <div class="col-md-12 m-3">
        <div class="card">
            <div class="row p-3">
                <!-- courses `price`, `name`, `allowance`, `category_id`, `number_of_days`, `vip`, `created_at` -->
                <div class="form-group col-md-6">
                    <label for="">الاسم</label>
                    <input type="text" value="<?= $course->name ?>" name="name" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">السعر</label>
                    <input type="text" name="price" value="<?= $course->price ?>" class="form-control">
                    <input type="hidden" name="id" value="<?= $course->id ?>" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="">عدد الايام</label>
                    <input type="text" value="<?= $course->number_of_days ?>" name="number_of_days"
                        class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="">الحافز</label>
                    <input type="text" value="<?= $course->allowance ?>" name="allowance" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="">التصنيف</label>
                    <select class="form-control" name="category_id" id="vip">
                        <?php foreach ($category_courses as  $category) : ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="form-group col-md-6">
                    <label for="vip">النوع</label>
                    <select class="form-control" name="vip" id="vip">
                        <option value="1">vip</option>
                        <option value="0">عاي</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <button class="btn btn-primary btn-md">تعديل كورس</button>
                </div>
            </div>
        </div>




    </div>
    </div>
</form>
