    <form action="<?= base_url() ?>index.php/admin/post_add_stock" method="post">
        <div class="row m-4">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="name" placeholder="اسم المتج">
            </div>
            <div class="form-group col-md-6">
                <select class="form-control" name="stock_cat_id">
                    <?php foreach ($stock_cat as $cat): ?>
                    <option value="<?=  $cat->id ?>"><?=  $cat->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">اضافة منتج</button>
            </div>
        </div>
    </form>
