<form action="<?= base_url() ?>index.php/admin/course_add_post" method="post">
    <div class="col-md-12 p-3">
        <div class="card">
            <div class="row p-3">
                <!-- courses `price`, `name`, `allowance`, `category_id`, `number_of_days`, `vip`, `created_at` -->
                <div class="form-group col-md-6">
                    <label for="">الاسم</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">السعر</label>
                    <input type="text" name="price" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="">عدد الايام</label>
                    <input type="text" name="number_of_days" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="">الحافز</label>
                    <input type="text" name="allowance" class="form-control">
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
				<button class="btn btn-primary btn-lg">اضافه دورة </button>
            </div>


        </div>
    </div>
</form>
