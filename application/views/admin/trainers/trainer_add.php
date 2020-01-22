<form action="<?= base_url() ?>index.php/admin/trainer_add_post" method="post">
    <div class="col-md-12 m-3">
        <div class="card">
            <div class="row p-3">
                <!-- courses `price`, `name`, `allowance`, `category_id`, `number_of_days`, `vip`, `created_at` -->
                <div class="form-group col-md-12">
                    <label for="">اسم المدرب</label>
                    <input type="text"  name="name" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">المرتب الشهرى</label>
                    <input type="text"  name="salary" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">رقم الهاتف</label>
                    <input type="text" name="phone" class="form-control">
				</div>
				
                <div class="form-group col-md-6">
                    <label for="">السياره</label>
					<select class="form-control" name="car_id">
					<?php foreach ($cars as $car): ?>
					<option value="<?= $car->id ?>"><?= $car->car_nmuber ?></option>
					<?php endforeach ; ?>
					</select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">الاكاديميه</label>
					<select class="form-control" name="school_id">
					<?php foreach ($schols as $schol): ?>
					<option value="<?= $schol->id ?>"><?= $schol->name ?></option>
					<?php endforeach ; ?>
					</select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">العنوان</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group col-md-6">
					<label for=""> الجنس</label>
					<select class="form-control" name="gender" id="" class="form-group">
						<option value="mail">ذكر</option>
						<option value="fmail">انثى</option>
					</select>
                </div>


                <div class="form-group col-md-6">
                    <button class="btn btn-primary btn-md">اضافة </button>
                </div>
            </div>
        </div>
    </div>
</form>
