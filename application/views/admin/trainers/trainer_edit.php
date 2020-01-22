<form action="<?= base_url() ?>index.php/admin/trainer_edit_post" method="post">
    <div class="col-md-12 m-3">
        <div class="card">
            <div class="row p-3">
				<!-- trainers `name`, `phone`, `car_id`, ``, `gender`, `status` -->
           
                <div class="form-group col-md-6">
                    <label for="">اسم المدرب</label>
                    <input type="text" value="<?= $trainer->name ?>" name="name" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">رقم الهاتف</label>
                    <input type="text" name="phone" value="<?= $trainer->phone ?>" class="form-control">
                    <input type="hidden" name="id" value="<?= $trainer->id ?>" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">العنوان</label>
                    <input type="text" name="address" value="<?= $trainer->address ?>" class="form-control">
                </div> 
               
				<div class="form-group col-md-6">
                    <label for="">النوع</label>
                    <select class="form-control" name="gender" id="gender">
					   
						<option  <?php if ($trainer->gender == 'زكر') echo 'selected' ?> value="زكر">زكر</option>
                        <option <?php if ($trainer->gender == 'انثى') echo 'selected' ?> value="انثى">انثى</option>
                    </select>
                </div>
				<div class="form-group col-md-6">
                    <label for="">النوع</label>
                    <select class="form-control" name="car_id" id="car_id">
                        <?php foreach ($cars as  $car) : ?>
                        <option <?= $car->id == $trainer->car_id ? 'selected' : '' ?> value="<?= $car->id ?>"><?= $car->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
				<br>
                <div class="form-group col-md-12">
                    <button class="btn btn-primary btn-md">تعديل </button>
                </div>
            </div>
        </div>
    </div>
</form>
