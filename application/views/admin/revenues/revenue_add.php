<div class="container mt-5">
    <form action="<?= base_url() ?>index.php/admin/revenue" method="post">
        <div class="row">
            <div class="form-group col-md-12">
			<h3>عرض الايرادات بالتاريخ</h3>
			</div>
            <div class="form-group col-md-6">
                <label for="">تاريخ الايراد</label>
                <input type="date" class="form-control" name="day" id="" aria-describedby="helpId" placeholder="">
            </div>


            <div class="form-group">
                <br>
                <input name="note" id="" class="btn btn-primary" type="submit" value="عرض">
            </div>
        </div>
    </form>
    <br>
    <hr>
    <br>
    <form action="<?= base_url() ?>index.php/admin/revenue_add_post" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">المبلغ</label>
                <input type="text" class="form-control" name="amount" id="" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group col-md-6">
                <label for="">الوحده</label>
                <select class="form-control" name="department" id="">
                    <option>الورشه</option>
                    <option>التنكر</option>
                    <option>المغسله</option>
                </select>
            </div>

            <div class="form-group col-md-12">
                <label for="">ملاحظات</label>
                <textarea class="form-control" name="note" id="" rows="3"></textarea>
            </div>
            <input id="" class="btn btn-primary" type="submit" value="اضافه">
        </div>
    </form>
</div>
