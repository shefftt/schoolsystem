<form action="<?= base_url() ?>index.php/admin/car_add_post" method="post">
    <div class="card m-5">

        <div class="card-body">
            <!-- `id`, `name`, `model`, `car_nmuber`, `insurance_starting_date`, `insurance_ending_date`, `license_date`, `manufacturing`, `created_at` -->
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="example-date-input" class="col-2 col-form-label">الموديل</label>
                        <div class="col-10">
                            <input class="form-control" name="model" type="date" id="example-date-input">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="example-date-input" class="col-2 col-form-label">الاسم</label>
                        <div class="col-10">
                            <input class="form-control" name="name" type="text" id="example-date-input">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="example-date-input" class="col-2 col-form-label">رقم اللوحه</label>
                        <div class="col-10">
                            <input class="form-control" name="car_nmuber" type="text" id="example-date-input">
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="example-date-input" class="col-2 col-form-label">بدايه التامين</label>
                        <div class="col-10">
                            <input class="form-control" name="insurance_starting_date" type="date"
                                id="example-date-input">
                        </div>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="example-date-input" class="col-2 col-form-label">الصناعه </label>
                        <div class="col-10">
                            <input class="form-control" name="manufacturing" type="text"
                                id="example-date-input">
                        </div>
                    </div>



                    <div class="form-group col-md-6">
                        <label for="example-date-input" class="col-2 col-form-label">نهايه التامين</label>
                        <div class="col-10">
                            <input class="form-control" name="insurance_ending_date" type="date"
                                id="example-date-input">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="example-date-input" class="col-2 col-form-label">تاريخ الترخيص</label>
                        <div class="col-10">
                            <input class="form-control" name="license_date" type="date" id="example-date-input">
                        </div>
                    </div>




                    <div class="row">
                        <div class="form-group col-md-12">

                            <button v-on:click="add_car" class="btn btn-md btn-info">اضافة سياره</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
</div>
